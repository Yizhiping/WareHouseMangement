<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/10
 * Time: 9:39
 */
?>
<style>
    #divMainMenu table tr td a {
        display: block;
        border: 1px solid black;
        color: black;
        height: 20px;
        width: 80px;
        float:left;
        text-align: center;
        font-size:16px;
        line-height:20px;
        margin-right: 2px;
        border-radius: 5px;
        text-decoration: none;

    }

    #divMainMenu table tr td a:hover {
        border-left: 1px solid blue;
        border-top: 1px solid blue;
        border-right:  3px solid red;
        border-bottom:  3px solid red;
        font-weight: bold;
        background-color: #000;
        color: #fff;
    }
</style>
<div id="divMainMenu">
    <table width="100%" border="0">
      <tr>
        <td width="80%">
            <a href="?act=search">查詢</a>
            <a href="?act=goodsin">入庫</a>
            <a href="?act=goodsout">出庫</a>
            <a href="?act=shelf">儲位</a>
            <a href="?act=inventory">盤點</a>
            <a href="?act=users">用戶管理</a>
            <a href="?act=roles">角色管理</a>
            <a href="?act=fun">功能管理</a>
            <a href="#">調整</a>
        </td>
        <td width="20%"><a href="?act=userDetail"><?php echo $user->name ?></a><a href="?act=userLogout">登出</a></td>
      </tr>
    </table>
</div>