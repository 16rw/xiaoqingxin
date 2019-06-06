<?php
/* Smarty version 3.1.33, created on 2019-06-06 13:34:06
  from 'F:\PHPstudy\PHPTutorial\WWW\web_com\html\templates\notice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf8a5ce277538_45597208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc988f1f9d8f7472c6849b26687828829ec84d2f' => 
    array (
      0 => 'F:\\PHPstudy\\PHPTutorial\\WWW\\web_com\\html\\templates\\notice.tpl',
      1 => 1559205820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf8a5ce277538_45597208 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['WEBTITLE']->value;?>
--信息提示</title>
</head>
<style>
.con{ width:500px;height: 100px;border: 1px #DDD solid; }
p{ color: blue; text-align: center;}
span{color:red;}
.kk{ width: 300px;}
p a{ color: green; margin-left: 180px;}
</style>

<body>
	<div class="con">
		<p>消息提示：<?php echo $_smarty_tpl->tpl_vars['info']->value;?>
,<span id='time'></span>秒后自动返回。</p>
		<div class="kk">
			<p><a href="<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;
echo $_smarty_tpl->tpl_vars['path']->value;?>
">点击返回</a></p>
		</div>
	</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
	var int=setInterval("clock()",1000);
	//将变量num设置为全局变量
	var num=5;
	function clock(){
		num>0 ? num-- : clearInterval(int);
		document.getElementById("time").innerHTML=num;
	}
	//三秒后跳转
	var locationOut = setTimeout(function(){
		window.location.href = "<?php echo $_smarty_tpl->tpl_vars['WEBURL']->value;
echo $_smarty_tpl->tpl_vars['path']->value;?>
";
	},2000);
	locationOut();
<?php echo '</script'; ?>
>
</html>
<?php }
}
