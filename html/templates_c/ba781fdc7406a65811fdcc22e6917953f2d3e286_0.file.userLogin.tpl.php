<?php
/* Smarty version 3.1.33, created on 2019-06-06 13:34:25
  from 'F:\PHPstudy\PHPTutorial\WWW\web_com\html\templates\userLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf8a5e136be20_66224440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba781fdc7406a65811fdcc22e6917953f2d3e286' => 
    array (
      0 => 'F:\\PHPstudy\\PHPTutorial\\WWW\\web_com\\html\\templates\\userLogin.tpl',
      1 => 1558063086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf8a5e136be20_66224440 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['WEBTITLE']->value;?>
-用户登录</title>

</head>

<body>
<form action="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/userLoginPost" method="post">
<table>
	<tr>
		<?php if ($_smarty_tpl->tpl_vars['flag']->value == 1) {?>
		<span style="color: red">用户登录失败</span>
		<?php }?>
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
<?php }
}
