<?php
/* Smarty version 3.1.33, created on 2019-06-06 14:02:29
  from 'F:\PHPstudy\PHPTutorial\WWW\web_com\html\templates\userManage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf8ac752df198_81871454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beb5c923687804cabb5be780d319414a08aa8b3f' => 
    array (
      0 => 'F:\\PHPstudy\\PHPTutorial\\WWW\\web_com\\html\\templates\\userManage.tpl',
      1 => 1559800947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf8ac752df198_81871454 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['WEBTITLE']->value;?>
</title>
</head>
<style type="text/css">
	h2{margin-left: 105px;}
	.page{ width: 200px; height: 30px; border:1px  solid; }
		.page a{ display: block; float: left; height: 30px; margin-left: 10px; width: 30px; color:black; text-decoration: none; line-height: 30px; text-align: center;border: 1px black solid; }
		.current{ background-color:blue; color: white;  }
		/*
		<td colspan="3" class="page">
					<a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/UserManage/pageup/<[$page]>">上一页</a>
					<?php echo $_smarty_tpl->tpl_vars['pageList']->value;?>

					<a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/UserManage/pagedn/<[$page]>">下一页</a>
				</td>
		 */
</style>

<body style="  ">
	<h2>用户管理列表</h2>
	<div class="con">
		<table border="">
			<tr>
				<td colspan="8"><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/userReg">添加用户</a> 
				<form action="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/searchUser" method="post">
					<input type="text" name="search"> 
					<input type="submit" name="" value="查找用户">
				</form>
				</td>
			</tr>
			<form action="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/DelAll" method="post">
			<tr>
				<td><input type="checkbox" onclick="SelectAll()" id="check">全选</td>
				<td>id</td>
				<td>角色</td>
				<td>用户名</td>
				<td>密码</td>
				<td>年龄</td>
				<td>操作</td>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrList']->value, 'arr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->value) {
?>
			<tr>
				<td><input type="checkbox" name="choose[]" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
</td>
				<td width=""><?php echo $_smarty_tpl->tpl_vars['arr']->value[1];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['arr']->value[2];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['arr']->value[3];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['arr']->value[4];?>
</td>
				<td>
				<a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/DeleUser/uid/<?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
">删除</a> 
				<a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/UpdateUser/uid/<?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
">修改</a>
				</td>
			</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<tr>
				<td><input type="submit" name="" value="批量删除"> </td>
				<td colspan="3" class="page">
					<?php echo $_smarty_tpl->tpl_vars['pageList']->value;?>

				</td>
			</form>
				<td><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/UserManage/order/asc">升序</a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;?>
?/User/UserManage/order/desc">降序</a>
				</td>
			</tr>
		</table>
	</div>
</body>
<?php echo '<script'; ?>
>
	function SelectAll() {
	 var id_check = document.getElementById('check');
	 var checkboxs=document.getElementsByName("choose[]");
	 //console.log(id_check.checked);
	 if (id_check.checked == false) {
	 	//console.log(id_check.checked);
	 	for (var i=0;i<checkboxs.length;i++) {
	  	var e=checkboxs[i];
	  	e.checked=false;
	 	}
	 }else{
	 	//console.log(id_check.checked);
	 	for (var i=0;i<checkboxs.length;i++) {
	  	var e=checkboxs[i];
	  	e.checked=true;
	 	}
	 }
	}

<?php echo '</script'; ?>
>
</html>
<?php }
}
