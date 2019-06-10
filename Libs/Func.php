<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/6
 * Time: 13:31
 */

/**
 * @param $v    获取get/post/session变量的值, 没有的话返回null
 * @return null
 */
function __get($v)
{
    $a = isset($_GET[$v]) ? $_GET[$v] : null;
    isset($a) || $a = isset($_POST[$v]) ? $_POST[$v] : null;
    isset($a) || $a = isset($_SESSION[$v]) ? $_SESSION[$v] : null;
    return $a;
}

/**
 * @param $msg 在页面上显示一个弹框信息.
 */
function __showMsg($msg)
{
    printf("<script type=text/javascript>alert(\"%s\");</script>",$msg);
}

function __getIP()
{
    $addr = $_SERVER["REMOTE_ADDR"];
    if(empty($addr)) $addr = $_SERVER["HTTP_CLIENT_IP"];
    if(empty($addr)) $addr = $_SERVER["HTTP_X_FORWARDED_FOR"];
    if(empty($addr)) $addr = 'Unknown';
    return $addr;
}