<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/6
 * Time: 14:35
 */
//require_once "MysqlConn.php";
class User
{
    public $uid;                //账号名称
    public $name;               //用户名称
    public $desc;        //用户描述
    public $mail;               //邮件
    public $lastLoginTime;     //最后登录时间
    public $lastLoginIP;        //最后登录地址
    public $loginTimes;         //登录次数
    private $uconn;
    public $isLogined = false;

    public $sampleUserInfo = array(
        'uid'   => null,
        'pwd'   => null,
        'name'  => null,
        'desc'  => null,
        'mail'  => null,
    );

    /**
     * 初始化, 如果是已經登錄, 則從session讀取用戶的相關信息
     * User constructor.
     */
    function __construct()
    {
        global $conn;
        $this->uconn = $conn;
        if(isset($_SESSION['isLogined']))
        {
            if($_SESSION["isLogined"] == true) {
                $this->uid = $_SESSION["uid"];
                $this->name = $_SESSION["uname"];
                $this->descirption = $_SESSION["description"];
                $this->mail = $_SESSION["umail"];
                $this->isLogined = $_SESSION["isLogined"];
                $this->group = $_SESSION["ugroup"];
            }
        }
    }

    /**
     * 用戶登錄
     * @param $uid  用戶賬號
     * @param $pwd  用戶密碼
     * @return bool
     */
    function login($uid, $pwd)
    {
        $userInfo = $this->uconn->getFristRow("select * from users where Uid='{$uid}'");
        if($userInfo)
        {
            if(password_verify($pwd, $userInfo[3]))
            {
                //将用户信息存入session
                $_SESSION['isLogined'] = true;
                $_SESSION['uid'] = $userInfo[1];
                $_SESSION['uname'] = $userInfo[2];
                $_SESSION['description'] = $userInfo[5];
                $_SESSION['umail'] = $userInfo[4];
                $_SESSION['ugroup'] = $userInfo[6];

                //赋值用户信息
                $this->isLogined = $_SESSION['isLogined'];
                $this->uid = $_SESSION['uid'];
                $this->name = $_SESSION['uname'];
                $this->descirption = $_SESSION['description'];
                $this->mail = $_SESSION['umail'];
                $this->group = $_SESSION['umail'];

                //更新登录信息
                $this->lastLoginIP = __getIP();
                $this->uconn->query("update users set LastLoginIP='{$this->lastLoginIP}', LastLoginTime=now(), LoginTimes=LoginTimes+1 where Uid='{$this->uid}'");
                $sql = "select logintimes,lastlogintime,lastloginip from users where uid='{$this->uid}'";
                $res = $this->uconn->getFristRow($sql);
                $this->loginTimes = $res[0];
                $this->lastLogintTime = $res[1];
                $this->lastLoginIP = $res[2];
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    /**
     * 用戶登出
     */
    function logout()
    {
        $this->isLogined = false;
        $_SESSION = array();        //将session设置为一个空数组, 清除所有数据.
    }

    /**
     * 刪除一個用戶
     * @param $uid  賬號
     * @return bool|mysqli_result
     */
    public function delete($uid)
    {
        if($this->authByRole('管理員',true)) return;
        return $this->uconn->query("delete from users where Uid='{$uid}'");
    }

    /**
     * 變更用戶密碼
     * @param $uid      賬號
     * @param $oldPwd   舊密碼
     * @param $newPwd   新密碼
     * @return bool|mysqli_result
     */
    public function changePassword($uid, $oldPwd, $newPwd)
    {
        if(password_verify($oldPwd,$this->uconn->getItemByItemName("select password from users where Uid='{$uid}'")))
        {
            return $this->uconn->query("update users set PassWord='{$newPwd}'");
        } else {
            return false;
        }
    }

    /**
     * 增加一個用戶
     * @param $userInfo
     * @return bool|mysqli_result
     */
    public function add($userInfo)
    {
        $sql = "insert into users (Uid, UName, PassWord, Mail, Descirption) value (
                '{$userInfo['uid']}',
                '{$userInfo['name']}',
                '{$userInfo['pwd']}',
                '{$userInfo['mail']}',
                '{$userInfo['desc']}'
                )";
        return $this->uconn->query($sql);

    }

    /**
     *  以業務名稱驗證當前用戶是否有權限訪問
     * @param $fname 業務名稱.
     * @param bool $alert 是否顯示警告
     * @return bool
     */
    function authByFun($fname, $alert=true)
    {
        $err = false;
        //獲取所有用戶角色

        $sql = "select name from fun where code in(select fid from rfid where rid in (select rid from urid where uid='{$this->uid}'))";
        if($fList = $this->uconn->getLine($sql))
        {
            if(in_array($fname,$fList))
            {
                return true;
            } else {
                if($alert) __showMsg('沒有權限訪問當前業務.');
                return false;
            }
        } else {
            if($alert) __showMsg('沒有權限訪問當前業務.');
            return false;
        }
    }

    /**
     * 以角色名稱驗證當前用戶是否有權限訪問
     * @param $rName    角色名
     * @param bool $alert 是否顯示警告
     * @return bool
     */
    function authByRole($rName, $alert=true)
    {
        $sql = "select name from role where code in (select rid from urid where uid='{$this->uid}')";
        if ($rList = $this->uconn->getLine($sql)) {
            if (in_array($rName, $rList)) {
                return true;
            } else {
                if ($alert) __showMsg('沒有權限訪問當前業務.');
                return false;
            }
        } else {
            if ($alert) __showMsg('沒有權限訪問當前業務.');
            return false;
        }
    }
}