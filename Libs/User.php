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
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

}