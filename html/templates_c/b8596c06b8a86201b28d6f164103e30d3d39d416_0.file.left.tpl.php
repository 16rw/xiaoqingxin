<?php
/* Smarty version 3.1.33, created on 2019-06-06 13:49:12
  from 'F:\PHPstudy\PHPTutorial\WWW\web_com\html\templates\left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf8a958f22264_13035222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8596c06b8a86201b28d6f164103e30d3d39d416' => 
    array (
      0 => 'F:\\PHPstudy\\PHPTutorial\\WWW\\web_com\\html\\templates\\left.tpl',
      1 => 1559800150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf8a958f22264_13035222 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['WEBTITLE']->value;?>
</title>
</head>
<style>
	li{margin-top:20px;}
	li a{text-decoration : none; }
	li a:hover{color:red;}
</style>

<body bgcolor="#f0f8ff">
	小清新框架后台管理系统
	<ul style="list-style:none; text-decoration : none">
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/UserManage"  target="right-frame">用户管理</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/powerManage"  target="right-frame">权限管理</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/roleManage" target="right-frame">角色管理</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/userLogin" target="main">退出管理</a></li>
	</ul>
</body>
</html>
<?php }
}
