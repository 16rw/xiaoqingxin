<?php
/* Smarty version 3.1.33, created on 2019-06-06 13:23:00
  from 'F:\PHPstudy\PHPTutorial\WWW\web_com\html\templates\userReg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf8a334727385_31627899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18ea114d91dfc02552760a43470faab1297e0f3a' => 
    array (
      0 => 'F:\\PHPstudy\\PHPTutorial\\WWW\\web_com\\html\\templates\\userReg.tpl',
      1 => 1558679764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf8a334727385_31627899 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['WEBTITLE']->value;?>
-用户添加</title>

</head>

<body>
<form action="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/userRegPost<?php if ($_smarty_tpl->tpl_vars['arr']->value != '') {?>/uid/<?php echo $_smarty_tpl->tpl_vars['arr']->value[0][0];
}?>" method="post">
<table>
	
	<tr>
		<td>用户名</td>
		<td><input type="text" name="username" value="<?php if ($_smarty_tpl->tpl_vars['arr']->value != '') {
echo $_smarty_tpl->tpl_vars['arr']->value[0][1];
}?>"/></td>
	</tr>
	<tr>
		<td>密码</td>
		<td><input type="password" name="password" value="<?php if ($_smarty_tpl->tpl_vars['arr']->value != '') {
echo $_smarty_tpl->tpl_vars['arr']->value[0][2];
}?>"/></td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="text" name="age" value="<?php if ($_smarty_tpl->tpl_vars['arr']->value != '') {
echo $_smarty_tpl->tpl_vars['arr']->value[0][3];
}?>"/></td>
	</tr>
	<tr>
		<td><input type="submit" value="<?php if ($_smarty_tpl->tpl_vars['arr']->value != '') {?>修改用户<?php } else { ?>添加用户<?php }?>"/></td>
	</tr>
</table>
</form>
</body>
</html>
<?php }
}
