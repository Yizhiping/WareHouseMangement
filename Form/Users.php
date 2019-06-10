<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/10
 * Time: 17:11
 */

if(__get('UserAdd')=='1')   //添加用戶
{
    echo 123;
    $uid = __get('uid');
    $uname = __get('uname');
    $pwd = password_hash(__get('password'),PASSWORD_DEFAULT);
    $mail = __get('mail');
    $desc = __get('description');

    $sql = "insert into users (
                                  Uid, 
                                  UName, 
                                  PassWord, 
                                  Mail, 
                                  Descirption ) 
            value (
                    '{$uid}',
                    '{$uname}',
                    '{$pwd}',
                    '{$mail}',
                    '{$desc}')";
    if($conn->query($sql))
    {
        __showMsg('用戶添加成功');
    } else {
        __showMsg('用戶添加失敗,'. $conn->getErr());
    }
}

//獲取所有用戶列表
$opstr = "";
foreach ($conn->getLine("select uid from users") as $u)
{
    $opstr .= "<option value='{$u}'>{$u}</option>";
}

//獲取用戶角色
foreach ($conn->getAllRow("select name,code from role") as $r)
{
    
}


?>

<div id="divUserAdd">
    <form action="?act=users&amp;subact=useradd" method="post" enctype="multipart/form-data" id="formUserAdd">
      <table width="400" border="0">
        <tr>
          <td>賬號名</td>
          <td><input type="text" name="uid" id="uid" /></td>
        </tr>
        <tr>
          <td>用戶名</td>
          <td><input type="text" name="uname" id="uname" /></td>
        </tr>
        <tr>
          <td>密碼</td>
          <td><label for="password"></label>
          <input type="text" name="password" id="password" /></td>
        </tr>
        <tr>
          <td>郵件</td>
          <td><input type="text" name="mail" id="mail" /></td>
        </tr>
        <tr>
          <td>備註</td>
          <td><input type="text" name="description" id="description" /></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="btnUserAdd" id="btnUserAdd" value="創建用戶" />
          <input name="UserAdd" type="hidden" id="UserAdd" value="1" /></td>
        </tr>
      </table>
    </form>
</div>

<div id="divUserManagement">
  <form action="?act=users&amp;subact=usermanagement" method="post" enctype="multipart/form-data" name="formUserManagement" id="formUserManagement">
    <label>選擇用戶
      <select name="userID" id="userID">
          <option value="">選擇用戶</option>
        <?php echo $opstr ?>
      </select>
    </label>
    <input type="button" name="btnUserDel" id="btnUserDel" value="刪除用戶" />
    <label for="checkbox">1111</label><input type="checkbox" name="checkbox" id="checkbox" checked="checked" />
    
  </form>
</div>