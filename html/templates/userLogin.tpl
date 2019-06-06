<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$WEBTITLE}>-用户登录</title>

</head>

<body>
<form action="<{$WEBURL}>?/User/userLoginPost" method="post">
<table>
	<tr>
		<{if $flag==1}>
		<span style="color: red">用户登录失败</span>
		<{/if}>
	</tr>
	<tr>
		<td>用户名</td>
		<td><input type="text" name="username"/></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td>记住密码</td>
		<td><input type="checkbox" name="check"/> 保存30天</td>
	</tr>
	<tr>
		<td><input type="submit" value="登录"/></td>
	</tr>
</table>
</form>
</body>
</html>
