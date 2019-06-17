<?php
/**
 * Created by PhpStorm.
 * User: Ping_
 * Date: 2019/6/11
 * Time: 22:13
 */
?>

<div>
    <form id="formSearch" name="formSearch" method="post" action="?act=search">
        <label for="searchType">查詢類型</label>
        <select name="searchType" id="searchType">
            <option value="S001">儲位</option>
            <option value="S002">訂單</option>
            <option value="S003">棧板</option>
        </select>
        <label for="iptSearch">查詢内容</label>
        <input type="text" name="iptSearch" id="iptSearch"/>
        <input type="submit" name="btnSeatch" id="btnSearch" value="查詢">

    </form>
</div>
