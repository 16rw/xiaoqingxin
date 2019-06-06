<?php
date_default_timezone_set("Asia/Chongqing");
 /* //cookid测试
  $time=60*60;
  $value = 'php';
  setcookie('TestCookie',$value,time()-3600);
  setcookie('Cookie','java',time()+10);
  print_r($_COOKIE);
  exit;
*/


  //swoole   php的扩展   使用异步编程
/*  var $fun = function($id){
      echo "判断变量是否为整数";
      return 1;
  }


  function test('fun',$id=1){
       if(fun($id)){

       }
  }*/

  //回调函数
 /* function test($username,$password){

     echo "我的名字叫".$username."密码".$password;
  }
  class Person{
      function getName($arr){
         
          echo "我的名字叫".$username."密码".$password."时间".$time;
      }
  }
  $p = new Person();

  call_user_func_array(array($p,'getName'),array(array('java','666','time','age')));

  exit;


  call_user_func_array('test', array('username'=>'php','password'=>'123'));
  exit;

*/



   header("Content-Type:text/html;charset=utf-8");
   /*$mysqli = new mysqli("localhost","root","root");
   $mysqli->select_db("web_com");
   $sql = "select id,username,password from user where username=? and password=? and id=?";
   //$sql = "select username,password  from user";
   //向mysql数据库发送一个预处理语句
   $stmt = $mysqli->prepare($sql);
   $id=2;
   $name = 'java';
   $pass = '456';

   $userInfo = array('id'=>2,'username'=>'java','password'=>'123');
   //绑定预处理语句的参数
   $type = '';
   foreach($userInfo  as $key=>$value){
       if(is_string($value)){
          $type .= 's';
       }else if(is_int($value)){
          $type .= 'i';
       }
   }
 
   
    1、必须绑定变量
    2、bind_param和绑定变量值有关
     
   $stmt->bind_param($type,$name,$pass,$id);
   //执行一个预处理语句
   $stmt->execute(); 


    $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
           print_r($row);
        }
        exit;
   //存储结果集 
   $stmt->store_result();
   //绑定结果集参数
   //bind_result绑定的结果和sql查询的字段个数保持一致
   $stmt->bind_result($id,$Uname,$Upass);
   //获取结果集的行数
   $num = $stmt->num_rows; 
   if($num>0){
      echo "登录成功!";
      //从结果集中遍历每行数据
      while ($stmt->fetch()) {
          echo $id."用户名：".$Uname."密码：<br>";
      }
   }else{
      echo "登录失败";
   }
   exit;
*/






   //index.php引导文件
   //定义root绝对路径
   define("ROOT",dirname(__FILE__));
    
   //设置当前为调试模式
   define('DEBUG',1); 
   //设置错误提示类型语言包   1：中文   2：英文    默认为中文  
   define('ERRORINFOLANGUAGE',1);
   //引入核心模块
  // require ROOT."/app/Exception/MsgException.php";
   require ROOT."/app/core/Service.php";


   
   //引入异常类
   //核心类加载
   Service::run();
/*
   class Person{
      //静态代码块
      static{

      }

      public static function say(){

      }

   }
   Person::say();






  $ser = new Service();


  //初始化对象
  function __construct(){

  }
*/
//  hive   
/*class Controller{
   function __construct($db){
      $this->db = $db;
   }
}

class UserController extends Controller{
     public function say(){
        echo "我的名字叫".$this->db;
     }
}


$p = new UserController('mysql');
$p->say();
exit;
*/








   /* class Person{
    	public $name;
    	public $age;
    	public static country = "cn";
    	public function __construct($name,$age){
    		$this->name = $name;
    		$this->age = $age;

    	}
    	
    }


    class Student extends Person{
    	public function say(){
    		echo "我的名字叫".;$this->name;
    	}
    }


    $p1 = new Person("张三",20);
    $p1->say();

    $p2 = new Person("李四",25);*/































   /*
   
	大数据     人工智能       物联网       云计算  
	G t  p  e   z  y
	分布式计算架构
	google   搜索引擎    数据的存储     云服务器
	                     存储设备成本低
						 集群  分布式存储系统   gfs
						 所有的存储是基于内存
						 数据计算     map映射   reduce规约

						 hadoop    hdbs   mapreduce
    erlang

    数据存储  gfs
    数据检索  全文检索   分词技术

               1     url    
			    我爱php    我爱重庆师范大学
               1    我              {1,3} {3,10} {6,20}
               1    爱             {1,3} {3,10} {6,20}
               1    重庆           {1,3} {3,10} {6,20}
                    重庆师范
                    重庆师范大学
    数据排名


    */



/*	print_r($_SERVER['PATH_INFO']);
	加载控制器
	
	user = new $action.Controller();
	user->addUser();
	
   	原始路径
   	http://localhost/web_com/index.php?action=userAdd&uid=3&sid=4
    封装的路径
	http://localhost/web_com/?/User/userAdd/uid/3/sid/4
	问题？
	1、如何处理url路径字符串的参数
	2、控制器如何获取url参数


*/
	
	 
/*
    class Person{
        public $name;
        public $age;
        public function __construct($name,$age){
            $this->name = $name;
            $this->age  = $age;
        }

        public function __toString(){\
            //定义一个模版显示异常错误信息
            return  "我的名字叫 ".$this->name.",年龄是".$this->age;
        }
    }


    $p = new Person('吴家林',18);

    echo $p;

    exit;

     /*
          异常和错误


          有一天吴昊程序员接到老婆一个电话，老婆说小吴下班回家买2斤鸡蛋，如果看到卖西红柿的，就买三斤
          告诉我，吴昊带回去的是什么？？？？

          三斤鸡蛋
          两斤鸡蛋三斤西红柿

          异常的定义
          try{
              可能出现的异常
          }

          捕获异常    解决异常的问题
          catch(){
              解决异常的办法
          }
     
    
    //吴家林上课
    
    try{
       /*早晨起床    闹钟没响
       刷牙洗漱    停水了         用矿泉水刷牙
       吃早饭      饭卡没钱
       骑车上课    掉坑里了
       上课
        
      

      echo "早晨起床<br>";
     // echo "刷牙洗漱<br>";
      throw  new Exception("停水了"); 
      
      echo "吃早饭<br>";
      echo "骑车上课<br>";
      echo "上课<br>";





    }catch(Exception $e){
        echo $e->getMessage();
        echo "用矿泉水刷牙";
    }

     



exit;



  //向php注册一个函数来处理错误，重新来封装错误提示
  //
  //把面向过程改装成面向对象的形式捕获这个错误信息
  //set_error_handler('errorFunction');

  //回调函数     异步编程
   
  //错误提示类
  class Error{
    //声明一个错误信息的静态属性
    public $errMessage;
    public function __construct(){
       set_error_handler(array($this,'errorFunction'));
    }
    public function errorFunction($erroron,$errorstr,$errorfile,$errorline){
        $this->errMessage = "{$errorstr},错误出现的文件{$errorfile},错误的行数{$errorline}<br>";



    }
  }
  $err = new Error();
  echo "这是我的框架结构!<br>";
  gettype();
  gettype($num);
  echo "++++++++++++++++++<br>";
  print_r($err->errMessage);  
  exit;*/

?>