<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/11
 * Time: 10:42
 */

$rid = __get('role');
$rDesc = __get("iptRoleDesc");
//新增角色
if(!empty(__get("btnRoleCreate")))
{
    if(empty($conn->getAllRow("select * from role where name='{$rDesc}'")))
    {
        $rid = uniqid('RID_');
        $conn->query("insert into role (Code, Name) value ('{$rid}','{$rDesc}')");
        __showMsg('角色創建成功.');
    } else {
        __showMsg('角色創建失敗,已存在相同角色..');
    }
}

//刪除角色
if(!empty(__get("btnRoleDel")))
{
    $conn->query("delete from rfid where rid='{$rid}'");
    $conn->query("delete from role where Code='{$rid}'");
    $rid="";
    __showMsg('角色刪除成功.');
}

//獲取所有角色清單
$roleList = $conn->getAllRow("select name,code from role order by  Name");
//獲取所有權限清單
$funList  = $conn->getAllRow('select code,name from fun order by Name');
//更新角色權限
if(!empty(__get('btnUpdateRoleInfo')))
{
    //刪除所有角色權限
    $conn->query("delete from rfid where rid='{$rid}'");
    foreach ($funList as $f)
    {
        if(!empty(__get($f[0])))
        {
            $conn->query("insert into rfid (rid, fid) value ('{$rid}','{$f[0]}')");
        }
    }
    __showMsg("角色權限更新成功.");
}

//獲取當前角色所有權限
$rfids = $conn->getLine("select fid from rfid where rid='{$rid}'");
if(!is_array($rfids)) $rfids = array();     //如有沒有直接賦值空數組
//以checkbox呈現角色權限
$checkBoxStr = "";
foreach ($funList as $f)
{
    if(in_array($f[0],$rfids)) {
        $checkBoxStr .= "<label for='{$f[0]}'>{$f[1]}</label><input type='checkbox' name='{$f[0]}' id='{$f[0]}' value='{$f[0]}' checked='checked'/>";
    } else {
        $checkBoxStr .= "<label for='{$f[0]}'>{$f[1]}</label><input type='checkbox' name='{$f[0]}' id='{$f[0]}' value='{$f[0]}'/>";
    }
}

//生成角色下拉清單
$roleListStr = "";
foreach ($roleList as $r)
{
    if($rid == $r[1])
    {
        $roleListStr .= "<option value='{$r[1]}' selected='selected'>{$r[0]}</option>";
    } else {
        $roleListStr .= "<option value='{$r[1]}'>{$r[0]}</option>";
    }
}


 ?>
 <form action="?act=roles" method="post" enctype="multipart/form-data" name="formRole">
   <div>
<!--     <label for="iptRid">創建角色:</label>-->
<!--      <input type="text" name="iptRid" id="iptRid" />-->
      <label for="iptRoleDesc">角色描述</label>
      <input type="text" name="iptRoleDesc" id="iptRoleDesc" />
<input type="submit" name="btnRoleCreate" id="btnRoleCreate" value="創建角色" />
   </div>
   <div>
     <label for="role">角色</label>
   <select name="role" id="role">
       <option>選擇角色</option>
        <?php echo $roleListStr ?>
   </select>
   <input type="submit" name="btnRoleDel" id="btnRoleDel" value="刪除角色" />
   <input type="submit" name="btnGetRoleInfo" id="btnGetRoleInfo" value="獲取角色權限" />
   <input type="submit" name="btnUpdateRoleInfo" id="btnUpdateRoleInfo" value="更新角色權限" />
   </div>
     <div>
         <?php echo $checkBoxStr ?>
     </div>

 </form>