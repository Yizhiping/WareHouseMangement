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
        height: 30px;
        width: 80px;
        float:left;
        text-align: center;
        font-size:16px;
        line-height:30px;
        margin-right: 5px;
        border-radius: 5px;
        text-decoration: none;
        padding: 2px 2px 1px;
    }

    #divMainMenu table tr td a:hover {
             border-left: 1px solid red;
             border-top: 1px solid red;
             border-right:  1px solid red;
             border-bottom:  1px solid red;
             font-weight: bold;
             background-color: #000;
             color: #fff;
         }
    #divMainMenu table tr td a:active  {
        border-left: 1px solid red;
        border-top: 1px solid red;
        border-right:  1px solid red;
        border-bottom:  1px solid red;
        font-weight: bold;
        background-color: greenyellow;
        color: #000;
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
            <?php
            if($user->authByRole("管理員",false))
            {
                echo '
                    <a href="?act=users">用戶管理</a>
                    <a href="?act=roles">角色管理</a>
                    <a href="?act=fun">功能管理</a>
                    ';
            }
            ?>
        </td>
        <td width="20%"><a href="?act=userDetail"><?php echo $user->name ?></a><a href="?act=userLogout">登出</a></td>
      </tr>
    </table>
</div>