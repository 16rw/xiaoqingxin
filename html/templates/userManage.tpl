<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$WEBTITLE}></title>
</head>
<style type="text/css">
	h2{margin-left: 105px;}
	.page{ width: 200px; height: 30px; border:1px  solid; }
		.page a{ display: block; float: left; height: 30px; margin-left: 10px; width: 30px; color:black; text-decoration: none; line-height: 30px; text-align: center;border: 1px black solid; }
		.current{ background-color:blue; color: white;  }
		/*
		<td colspan="3" class="page">
					<a href="<{$WEBURL}>?/User/UserManage/pageup/<[$page]>">上一页</a>
					<{$pageList}>
					<a href="<{$WEBURL}>?/User/UserManage/pagedn/<[$page]>">下一页</a>
				</td>
		 */
</style>

<body style="  ">
	<h2>用户管理列表</h2>
	<div class="con">
		<table border="">
			<tr>
				<td colspan="8"><a href="<{$WEBURL}>?/User/userReg">添加用户</a> 
				<form action="<{$WEBURL}>?/User/searchUser" method="post">
					<input type="text" name="search"> 
					<input type="submit" name="" value="查找用户">
				</form>
				</td>
			</tr>
			<form action="<{$WEBURL}>?/User/DelAll" method="post">
			<tr>
				<td><input type="checkbox" onclick="SelectAll()" id="check">全选</td>
				<td>id</td>
				<td>角色</td>
				<td>用户名</td>
				<td>密码</td>
				<td>年龄</td>
				<td>操作</td>
			</tr>
			<{foreach from=$arrList item=arr}>
			<tr>
				<td><input type="checkbox" name="choose[]" value="<{$arr[0]}>"></td>
				<td><{$arr[0]}></td>
				<td width=""><{$arr[1]}></td>
				<td><{$arr[2]}></td>
				<td><{$arr[3]}></td>
				<td><{$arr[4]}></td>
				<td>
				<a href="<{$WEBURL}>?/User/DeleUser/uid/<{$arr[0]}>">删除</a> 
				<a href="<{$WEBURL}>?/User/UpdateUser/uid/<{$arr[0]}>">修改</a>
				</td>
			</tr>
			<{/foreach}>
			<tr>
				<td><input type="submit" name="" value="批量删除"> </td>
				<td colspan="3" class="page">
					<{$pageList}>
				</td>
			</form>
				<td><a href="<{$WEBURL}>?/User/UserManage/order/asc">升序</a>
					<a href="<{$WEBURL}>?/User/UserManage/order/desc">降序</a>
				</td>
			</tr>
		</table>
	</div>
</body>
<script>
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

</script>
</html>
