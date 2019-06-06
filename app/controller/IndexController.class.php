<?php
	/*
	
	需求
	   1、用户登录
	       用户登录成功，显示所有用户
	            退出登录，跳转到主页面
	       用户登录失败，提示登录失败信息


	   2、用户登录成功后显示所有用户信息
	
	

	 */

	//默认访问控制器
	class IndexController extends Controller{
		
		public function Index(){
			$this->Tpl->display("index.tpl");
			//echo "欢迎使用小清新php框架!  <a href='http://localhost/web_com/?/User/userLogin'>登录</a><a href=''>注册</a><br>";
			//echo "<a href='http://localhost/web_com/?/User/userList/uid/1'>显示所有用户</a>";	

		}




	}