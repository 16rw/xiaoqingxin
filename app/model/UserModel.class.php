<?php
	/*
	php数据提交流程
	前端表单提交过来的数据
	      -》写入到数据的持久层
	      -》在控制器中调用数据持久层数据
 	      —》把数据写入到数据库

    java分成j2se   和   j2ee
    javaweb数据
	在javaweb中是-》表单提交过来的的数据
	             -》service来转发           
	             -》javabean来实现的数据持久
	             -》调用控制器写入数据
	 */




	class UserModel implements Model{
		//用户名
		public $userName;
		//密码
		public $passWord;
		//邮箱
		public $email;
		//设置用户名
		public function setName($userName){
			$this->userName = $userName;
		}
		//获取用户名
		public function getUserName(){
			return $this->userName;
		}
	}

