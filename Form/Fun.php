<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/11
 * Time: 17:06
 */

//創建功能
$funDesc = __get('iptFunDesc');
if(!empty(__get('btnCreateFun')))
{
    $a = $conn->query("select code from fun where name='{$funDesc}'");
    if($a->lengths == 0)
    {
        $fid = uniqid('FID_');
        $conn->query("insert into fun (Code, Name) value ('{$fid}','{$funDesc}')");
        __showMsg('功能創建成功');
    } else {
        __showMsg('功能創建失敗, 已存在相同功能.');
    }
}

//刪除功能
if(!empty(__get('btnFunDel')))
{
    foreach ($conn->getAllRow("select code from fun") as $f)
    {
        if(!empty(__get($f[0])))
        {
            $conn->query("delete from rfid where fid='{$f[0]}'");
            $conn->query("delete from fun where Code='{$f[0]}'");
        }
    }
    __showMsg('功能刪除成功.');
}

//以checkbox呈現所有功能
$funListstr = "";
foreach ($conn->getAllRow("select code,name from fun order by Name") as $f)
{
    $funListstr .= "<tr><td>{$f[1]}</td><td><input type='checkbox' id='{$f[0]}' name='{$f[0]}' value='{$f[0]}'/></td></tr>";
}

?>
<form action="?act=fun" method="post" enctype="multipart/form-data" name="formFun" id="formFun">
<div>
    <div>
      <label for="iptFunDesc">功能描述</label>
      <input type="text" name="iptFunDesc" id="iptFunDesc" />
      <input type="submit" name="btnCreateFun" id="btnCreateFun" value="創建功能" />
    </div>
    <div>
    	<table>
            <?php echo $funListstr ?>
        </table>
        <input type="submit" name="btnFunDel" id="btnFunDel" value="刪除選擇的功能" />
    </div>
</div>
</form>