<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/10
 * Time: 9:39
 */
?>

<table width="100%" border="0">
  <tr>
    <td width="80%">
        <a href="?act=search">查詢</a>
        <a href="?act=goodsin">入庫</a>
        <a href="?act=goodsout">出庫</a>
        <a href="?act=shelf">儲位</a>
        <a href="?act=inventory">盤點</a>
        <a href="?act=users">用戶管理</a>
        <a href="#">調整</a>
    </td>
    <td width="20%"><a href="?act=userDetail"><?php echo $user->name ?></a><a href="?act=userLogout">登出</a></td>
  </tr>
</table>