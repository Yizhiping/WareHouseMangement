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

/** 創建一個下拉清單
 * @param $listArr  清單數組
 * @param null $name    名稱
 * @param null $id  id
 * @param null $class   類名
 * @param null $defaultVal  默認值
 * @param null $lab 標籤, 不賦值時不顯示標籤
 * @param false $disable 是否禁用
 */
function __createList($listArr, $name=null, $id=null, $class=null, $defaultVal=null, $lab=null, $disable=false)
{
    $html = null;
    if(!empty($lab)) $html .= "<lable for='{$name}'>{$lab}</lable>";
    $html .= "<select id='{$id}' name='{$name}' class='$class' ";
    $html .= $disable==true ? "disabled='disabled'>" : ">";
    $html .= "<option value='null'>請選擇</option>";
    foreach ($listArr as $i)
    {
        if($i == $defaultVal)
        {
            $html .= "<option value='{$i}' selected='selected'>{$i}</option>";
        } else {
            $html .= "<option value='{$i}'>{$i}</option>";
        }
    }
    $html .= "</select>";
    echo $html;
}