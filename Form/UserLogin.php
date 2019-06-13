<?php
/**
 * Created by PhpStorm.
 * User: Ping_yi
 * Date: 2019/6/6
 * Time: 16:15
 */
$uid = __get('uid');
$pwd = __get('password');

if(!empty(__get('btnUserLogin')))
{
    if(empty($uid) || empty($pwd))
    {
        __showMsg("账号和密码不能为空.");
    } else {
        if($user->login($uid, $pwd))
        {
            header("Location:" . $homeUrl);
        } else {
            __showMsg("账号或密码错误, 登录失败.");
        }
    }
}

?>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#btnuserLogin').click( function(e)
	{
		if($('#uid').val()=="" || $('#password').val() == "")
		{
			alert("用戶名和密碼不能為空.");
			return false;
		} else 
		{
            return true;
		}
	}
	);
});
</script>
<form id="formUserLogin" enctype="multipart/form-data" action="?act=userLogin" method="post">
    <table>
        <tr>
            <td align="right">账户:</td>
          <td align="left"><input id="uid" name="uid" type="text" value="<?php echo $uid ?>"/></td>
        </tr>
        <tr>
            <td align="right">密码:</td>
          <td align="left"><input id="password" name="password" type="password" value="<?php echo $pwd ?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnUserLogin" id="btnUserLogin" value="登入系统"></td>
        </tr>
    </table>
</form>

