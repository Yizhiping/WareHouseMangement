<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/10
 * Time: 9:52
 */

//$act = __get('act');

switch ($act)
{
    case "userLogout":
        $user->logout();
        header('Location:'. $homeUrl);
        break;

    default:
        if(empty($act))
        {
            //todo: 空請求, 顯示主頁.
        } else {
            if (file_exists("Form/" . $act . '.php')) {
                include "Form/" . $act . '.php';
            } else {
                include "Form/404.php";
            }
        }
        break;
}

pageEnd: