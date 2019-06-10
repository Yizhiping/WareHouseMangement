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

    case "userDetail":      //查看當前賬號信息, 改密碼等.
        include "Form/UserDetail.php";
        break;

    case "shelf":
        include "Form/Shelf.php";
        break;

    case "users":
        include "Form/Users.php";
        break;
}