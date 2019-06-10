<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/5
 * Time: 14:48
 */
include "Libs/Func.php";        //函数集
include "Libs/Config.php";      //设定
require_once "Libs/MysqlConn.php";   //Mysql连接库
include "Libs/User.php";        //用户管理

$user = new User();
$act  = __get("act");
$subact = __get('subact');

?>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="Css/MainPage.css" rel="stylesheet">
<link rel="icon" href="Favicon.ico">
<script type="text/javascript" src="Script/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="Script/jquery.cookie.js"></script>
<head>

    <title>成倉管理系統</title>
</head>
<body>
<div id="Container">
    <div id="header">成倉管理系統 </div>
    <div id="main">
        <div id="mainMenu">
            <?php
            /**
             主菜单, 登录后显示
             */
            if($user->isLogined)
            {
                include "Form/mainMenu.php";
            }
            ?>
        </div>
        <div id="mainContent">
            <?php
            /**
             * 这里是中间区域, 显示主要的内容.
             */
            if(!$user->isLogined)   //没有登录的话显示登录界面.
            {
                include "Form/UserLogin.php";
            } else {
                include "Form/Router.php";      //否则加载路由器,处理请求.
            }
            ?>
        </div>
    </div>
    <div id="footer">底部（footer）</div>
</div>
</body>

</html>
