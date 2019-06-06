<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$WEBTITLE}>-用户添加</title>

</head>

<body>
<form action="<{$WEBURL}>?/User/userRegPost<{if $arr!=''}>/uid/<{$arr[0][0]}><{/if}>" method="post">
<table>
	
	<tr>
		<td>用户名</td>
		<td><input type="text" name="username" value="<{if $arr!=''}><{$arr[0][1]}><{/if}>"/></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="password" name="password" value="<{if $arr!=''}><{$arr[0][2]}><{/if}>"/></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="text" name="age" value="<{if $arr!=''}><{$arr[0][3]}><{/if}>"/></td>
	</tr>
	<tr>
		<td><input type="submit" value="<{if $arr!=''}>修改用户<{else}>添加用户<{/if}>"/></td>
	</tr>
</table>
</form>
</body>
</html>
