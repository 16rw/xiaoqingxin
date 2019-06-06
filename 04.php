<?php
	header("Content-type:text/html;charset=utf8");
	// $sql = "select * from user where username='php' and paasword='123'";

	// $re  = Safe($sql);
	// print_r($re);
	// function Safe($str){
 
	// 	return $this->LinkSource->real_escape_string($str);
	// }

	// exit;
	
	// var fun = function(){
	// 	echo '变量是否为整数';
	// 	return 1;
	// }
	// function task('fun',$id=1){
	// 	if(fun($id)){

	// 	}
	// }

	//回调函数 call_user_func_array()
	// function test($username,$password){
	// 	echo '我叫'.$username.'密码'.$password;
	// }

	// class Person{
	// 	// public $o = array()
	// 	function getName($arr){
	// 		print_r($arr);

	// 		echo '我叫'.$username.'密码'.$password;
	// 	}
	// }
	// $p = new Person();

	// call_user_func_array(array($p,'getName'),array(array('php','132')));
	// exit;
	// call_user_func_array('test', array('username'=>'php','password'=>'123'));
	// exit;







	$mysqli = new mysqli('localhost','root','root');
	$mysqli->select_db('web_com');
	$sql = 'select id,username,password from user where id=? and username=? and password=?';
	$stmt = $mysqli->prepare($sql);
	//$id = 2;
	//$username = 'php';
	//$password = '123';	
	$userInfo = array('id'=>1,'username'=>'php','password'=>'123');
	$type = NUll;
	foreach ($userInfo as $key => $value) {
		if(is_string($value)){
			$type .= 's';
		}else if(is_int($value)){
			$type .='i';
		}
	}
	/**
	 * 1、必须绑定变量
	 * 2、bind_param和绑定变量的值有关
	 * 3、bind_result绑定的结果和sql查询的字段个数保持一致
	 */

	$arr = array();
	array_push($arr, $type);
	//便利用户数据信息取地址
	foreach ($userInfo as $key => $value) {
		$arrValue[] = &$userInfo[$key];
	}
	//把$arrValue放进$arr数组里
	$arrResult = array_merge($arr,$arrValue);
	
	// exit;
	// print_r($type);
	// exit;
	//$type = "ssi";
	//$stmt->bind_param($type,$username,$password,$id);
	// $arr = array($arrResult[0],$arrResult[1],$arrResult[2]);

	call_user_func_array(array($stmt,'bind_param'),$arrResult);
	$stmt->execute();
	//$stmt->store_result();
	//$stmt->bind_result($id,$username,$password);
	$result = $stmt->get_result();

	// print_r($result);
	// exit;
    while ($row = $result->fetch_array(MYSQLI_NUM)){
		print_r($row);
		//echo $id."用户名:".$username."密码".$password."<br />";
	}

	// $row = $stmt->num_rows;
	// //print_r($row);
	// if($row>0){
	// 	echo '登录成功<br />';
	// 	while($stmt->fetch()){
	// 		//$arr[] = ['id' => $id, 'username' => $username, 'password' => $password]; 
	// 		echo $id."用户名:".$username."密码".$password."<br />";
	// 	}
	// 	//print_r($arr);
	// }else{
	// 	echo "登录失败";
	// }
	



	/**
	 *字符转义
	 *mysql_real_escape_string()
	 *
	 *解决防sql注入
	 *预处理
	 *前提是必须创建mysqli的数据库连接
	 *$mysqli
	 *$stmt
	 *$sql = 'select * from user where username = ? and password = ?';
	 *$stmt = $mysqli->prepare($sql);
	 *$stmt->bind_param('ss',$username,$password);
	 *$stmt->execute();
	 *$stmt->bind_result($username,$password);
	 *while($stmt->fetch()){
	 *    printf("%s (%s)\n",$username,$password);
	 *}
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 * 
	 */











