<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$WEBTITLE}>--信息提示</title>
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
		<p>消息提示：<{$info}>,<span id='time'></span>秒后自动返回。</p>
		<div class="kk">
			<p><a href="<{$WEBURL}><{$path}>">点击返回</a></p>
		</div>
	</div>
</body>
<script type="text/javascript">
	var int=setInterval("clock()",1000);
	//将变量num设置为全局变量
	var num=5;
	function clock(){
		num>0 ? num-- : clearInterval(int);
		document.getElementById("time").innerHTML=num;
	}
	//三秒后跳转
	var locationOut = setTimeout(function(){
		window.location.href = "<{$WEBURL}><{$path}>";
	},2000);
	locationOut();
</script>
</html>
