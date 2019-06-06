<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/6
 * Time: 13:31
 */

function __get($var)
{
    $val = null;
    $val = !isset($_GET[$var]) ?  $_GET[$var] : null;
    $val = !isset($val) ? isset($_POST[$var]) ? $_POST[$var] : null : null;
    $val = !isset($val) ? isset($_SESSION[$var]) ? $_SESSION[$var] : null : null;
    return val;
}

