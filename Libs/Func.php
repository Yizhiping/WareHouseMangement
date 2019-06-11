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

/**
 * @param $type 類型，a button submit
 * @param $name name
 * @param $id id
 * @param $class class
 * @param $val value
 * @param $link href，a專用
 * @param $lab=null 是否使用Label,為空自動沒有
 */
function __createButton($type, $name, $id, $class, $val, $link, $lab=null)
{
    $htmlCode = "";
    $class .= " button blank";
    switch(strtoupper($type))
    {
        case "A":
            $htmlCode = "<a id='{$id}' name='{$name}' class='{$class}' href='{$link}'>{$val}</a>";
            break;

        case "BUTTON":
        case "SUBMIT":
            if($lab != null) $htmlCode .= "<lable for='{$name}'>{$lab}</lable>";
            $htmlCode .= "<input type='{$type}' id='{$id}' name='{$name}' class='{$class}' value='{$val}'/>";
            break;
    }
    echo $htmlCode;
}