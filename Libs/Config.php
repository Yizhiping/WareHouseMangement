<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/6
 * Time: 14:11
 */

date_default_timezone_set("Asia/Shanghai");     //设定默认时区
session_start();        //开启session

define("EOL", "<br />");        //定义一个Html的换行
require_once "MysqlConn.php";

/********************一些环境参数**********************/
$remoteAddr = __getIP();


/*********************数据库连接************************/
$db_host = "127.0.0.1";
$db_uid  = "root";
$db_pwd  = "root";
$db_name = "WareHouseManagement";

/**********************一些参数**************************/
$homeUrl = "Index.php";     //默认页面
$opid = 'S09264888';        //系統調用SFIS用到的工號
$device = '111111';         //系統調用SFIS用到的撥號



$conn = new MysqlConn($db_host, $db_uid, $db_pwd, $db_name);


