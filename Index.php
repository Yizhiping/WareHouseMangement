<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/5
 * Time: 14:48
 */
include "Libs/Config.php";      //设定
include "Libs/Func.php";        //函数集
require_once "Libs/MysqlConn.php";   //Mysql连接库
include "Libs/User.php";        //用户管理

$user = new User();

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
        <div id="mainMenu">主菜单</div>
        <div id="mainContent">主内容区</div>
    </div>
    <div id="footer">底部（footer）</div>
</div>
</body>

</html>
