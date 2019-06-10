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
    public $uid;       //账号名称
    public $name;      //用户名称
    private $pwd;       //密码
    public $descirption;   //用户描述
    public $group;     //用户组
    public $mail;      //邮件
    public $lastLogintTime;     //最后登录时间
    public $lastLoginIP;        //最后登录地址
    public $loginTimes;         //登录次数
    private $uconn;
    public $isLogined = false;


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

                //獲取角色

                //獲取權限

                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    function logout()
    {
        $this->isLogined = false;
        $_SESSION = array();        //将session设置为一个空数组, 清除所有数据.
    }

    function auth()
    {

    }

}