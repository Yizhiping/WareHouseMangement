<?php
/**
 * Created by PhpStorm.
 * User: Ping_
 * Date: 2019/6/17
 * Time: 23:50
 */

class Shelf
{
    private $Id;
    private $name;
    public $sConn;
    private $user;

    public function __construct()
    {
        global $conn;
        global $user;
        $this->sConn = $conn;       //初始化數據庫鏈接
        $this->user = $user;
    }

    public function __call($name, $arguments)
    {
        $fname = 'shelf'.$name;
        if($this->authChk($fname))
        {
            return call_user_func_array(array($this,$fname),$arguments);
        } else {
            __showMsg('無訪問權限,操作失敗.');
        }
    }

    private function authChk($method)
    {
        return $this->user->authByFunOnlyAuto($method);
    }

    public function shelfGetInfor($kwd)
    {
        return $this->sConn->getAllRow("select shelfid,description from shelfs where ShelfID like '{$kwd}'");
    }

    public function shelfAdd($id, $name)
    {
        return $this->sConn->query("insert into shelfs (ShelfID, Description) value ('{$id}','{$name}')");
    }

    public function shelfDel($id)
    {
        return $this->sConn->query("delete from shelfs where ShelfID='{$id}'");
    }

    public function shelfUpdate($uid, $newName)
    {
        return $this->sConn->query("update shelfs set Description='{$newName}' where ShelfID='{$uid}'");
    }
}