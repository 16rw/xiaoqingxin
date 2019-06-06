<?php
	/*
	
	控制器主要负责逻辑控制
	用户管理类
	
	git github    svn 单节点故障问题

	模型  mvc     模型    视图    控制器
	架构  分层
			   表现层    请求转发层   数据模型层   业务处理层
			   数据访问控制层

			   表单请求过来的数据封装到数据模型，控制器获取数据模型的对象来操作用户   
	用户状态记录
		cookie       存储服务器端发送给客户端的一个数据，以文件的形式存储
		session会话  服务器端产生的一个临时会话文件，向客户端发送一个

	
	*/
	class UserController extends Controller{

		//核心类对象容器成员属性
		public $app;

		//public $db;
		//控制器构造函数初始化核心类对象容器
		 /*public function __construct($singArr){
		 	//print_r($singArr);
		 	$this->app   = $singArr;
		 	$this->db    = $singArr['Db']->dbObject;
		 	//$this->page    = $singArr['page']; 

		 }*/
		 /*左边框架内容*/
		 public function mainLeft(){
		 	$this->Tpl->display("left.tpl");
		 }

		 /*用户管理*/
		 public function UserManage(){
		 	/*
		 		可变变量    当前页    查询数据的limit的偏移量   数据库的总条数

		 		总的分页逻辑结构
		 			通过获取分页对象，然后调用getPage方法获取整个分页
		 	 */
		 	//获取当前页面
		 	$page = $this->getPage();
		 	
		 	// //当前页数
		 	// $page=$this->Page->Dispage($this->UrlFilter);

		 	//获取当前排序方式   asc升序  desc降序
		 	$order = $this->getOrder();
		 	
		 	//获取数据库总行数
		 	$count = $this->getTotalRow("user");
		 	//返回分页页码
		 	$pageList = $this->Page->getPage($page,$count);

		 	$result = $this->Db->Table("user")
		 					   ->Field()
		 					   ->Order($order)
		 					   ->Limit($this->Page->offset,$this->Page->pageNum)
		 					   ->Select();
		 	
		 	
		 	$this->Tpl->assign('pageList',$pageList);

		 	$this->Tpl->assign('arrList',$result);
		 	$this->Tpl->display("userManage.tpl");
		 }

        /*权限管理*/
        public function powerManage(){
            $this->Tpl->display("powerManage.tpl");
        }

        /*角色管理*/
        public function roleManage(){
            $this->Tpl->display("roleManage.tpl");
        }

        //批量删除
        public function DelAll($value='')
        {
            foreach ($_POST['choose'] as $key => $value) {
                $result = $this->Db->Table("user")
                    ->where("id={$value}")
                    ->Delete();
            }
            if($result){
                //删除成功
                $this->Notice('用户删除成功','?/User/UserManage');
            }else{
                //删除失败
                $this->Notice('用户删除失败','?/User/UserManage');
            }
        }

		 /*删除用户*/
		 public function DeleUser(){
		 	//获取用户id
		 	//根据用户id删除用户
		 	//删除成功用户
		 	//通过get获取url地址参数
		 	$uid = $this->UrlFilter->appPar['uid'];

		 	$result = $this->Db->Table("user")
		 					   ->where("id={$uid}")
		 					   ->Delete();
		 	if($result){
		 		//删除成功
		 		$this->Notice('用户删除成功','?/User/UserManage');
		 	}else{
		 		//删除失败
		 		$this->Notice('用户删除失败','?/User/UserManage');
		 	} 
		 }
		 /*用户修改*/
		 public function UpdateUser(){
		 	$uid = $this->UrlFilter->appPar['uid'];
		 	$result = $this->Db->Table("user")
		 					   ->Field("*")
		 					   ->where(array('id'=>$uid))
		 					   ->Select();


		 	$this->Tpl->assign('arr',$result);
		 	$this->Tpl->display("userReg.tpl");

		 }

		 /*
		 	软件开发为什么要进行抽象
		  */
		 /*用户注册页面*/
		 public function userReg(){
		 	$this->Tpl->assign('arr','');
		 	$this->Tpl->display("userReg.tpl");
		 }
		 /*用户注册添加处理*/
		 public function userRegPost(){
		 	$parList = $this->UrlFilter->appPar;

		 	$username = $_POST['username'];
		 	$password = $_POST['password'];
		 	$age = (int)$_POST['age'];
		 	$value = array('username'=>$username,'password'=>$password,'age'=>$age);
		 	//用户添加
		 	if(!$parList){
		 		$this->Db->Table('user')
		 				 ->Insert($value);
		 		if($this->Db->ResultInsertId>0){
		 			//用户添加成功
		 			$this->Notice('用户添加成功','?/User/UserManage');
			 	}else{
			 		//用户添加失败
			 		$this->Notice('用户添加失败','?/User/UserManage');
			 	}
		 	}else{
		 		//修改用户

		 		$this->Db->Table('user')
		 				 ->Where(array('id'=>$parList['uid']))
		 				 ->Update($value);

		 		if($this->Db->ResultUpdate>0){
		 			//用户修改成功
		 			$this->Notice('用户修改成功','?/User/UserManage');
			 	}else{
			 		//用户修改失败
			 		
			 		$this->Notice('用户修改失败','?/User/UserManage');
			 	}
		 		
		 	}
		 	//执行sql语句
		 	//insert into user(username,password,age) values($username,$password,$age);
		 	//返回受影响的行数
		 	
		 }
		 /*查找用户*/
		 public function searchUser(){
		 	//获取当前页面
		 	$page = $this->getPage();
		 	//获取当前排序方式   asc升序  desc降序
		 	$order = $this->getOrder();
		 	//获取数据库总行数
		 	// $count = $this->getTotalRow("user");
		 	//返回分页页码
		 	// $pageList = $this->Page->getPage(1,$count);
		 	$like = '%'.$_POST['search'].'%';
		 	$result = $this->Db->Table("user")
		 					   ->Field()
		 					   ->where(array('username'=>$like),'yes')
		 					   ->Order($order)
		 					   // ->Limit($this->Page->offset,$this->Page->pageNum)
		 					   ->Select();
		 	if(!empty($result)){
		 		$kkk ='查询成功:';
		 	}else{
		 		$kkk ='暂无相关数据:';
		 	}
		 	$this->Tpl->assign('pageList',$kkk.$_POST['search']);
		 	$this->Tpl->assign('arrList',$result);
		 	$this->Tpl->display("userManage.tpl");
		 	
		 }
		 /*
		 	用户登录页面
		  */
		 public function userLogin(){
		 	$this->Tpl->assign('flag',0);
		 	$this->Tpl->display("userLogin.tpl");
		 }
		 /*退出登录*/
		 public function userExit(){
		 	//设置cookie值的生命周期
		 	setcookie('username',$_COOKIE['username'],time()-300);
		 	$this->Tpl->display("userLogin.tpl");
		 }
		 /*显示用户列表信息*/
		 public function displayUser(){
		 	print_r($_COOKIE);
		 	exit;
		 }

		 /*
		  用户登录
		  浏览器请求了userLogin方法，然后方法来读取模板
		  */
		public function userLoginPost(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			//从数据库查询用户数据
			$where = array('username'=>$username,'password'=>$password);
		 	$result = $this->Db->Table('user')
		 	                   ->Field('username,password')
		 	                   ->Where($where)
		 	                   ->Select();
			//print_r($result);
			if($result){
				$time = time()+100;
				setcookie('username',$username,$time);
				//print_r($_COOKIE);
		 		//echo $result[0][1]."用户登录成功!";
		 		$this->Tpl->assign("flag",0);
		 		$this->Tpl->assign("arr",$result);
		 		$this->Tpl->assign("username",$username);
		 		//记录用户登录成功的状态
		 		$this->Tpl->display("main.tpl");
		 	}else{
		 		//echo "用户登录失败!";
		 		$this->Tpl->assign("flag",1);
		 		$this->Tpl->display("userLogin.tpl");
		 	} 
			exit;
			//$arr = array('username'=>'吴浩','password'=>'123456');
			//$this->Tpl->assign("value",$arr);
 			//显示模板
 			$this->Tpl->display("login.tpl");
			//获取模板对象
			 
			/*require('app/Lib/Smarty/Smarty.class.php');  //引入smarty模板类

			$smarty = new Smarty;         //实例化一个smarty对象
		 

			$smarty->template_dir = 'html/templates/';    //模板文件
			$smarty->compile_dir = 'html/templates_c/';   //模板编译文件 ，这个文件可以任意删除

 
			//$smarty->assign('name','Ned');

			//$smarty->display('index.tpl');
 			 
 			//分配模板变量，php数组和模板变量做映射   value模板变量    "php" php变量
 			//
 			

 			 数组的数据结构是什么？   hash   哈希    散列      存储的数据是唯一的集合   

 			集合：有序集合  list   按照顺序存储    无序集合：
			 



 			
 			*/
		 	//echo "";
		 	
			//请求响应数据
			//请求转发模板文件
			
		 	//$this->StringBuffer->read();

		 }
		 /*
		 用户请求
		  */
		 public function loginPost(){
		 	 
		 	$where = array('username'=>$_POST['username'],'password'=>$_POST['password']);
		 	$result = $this->Db->Table('user')
		 	                   ->Field('username,password')
		 	                   ->Where($where)
		 	                   ->Select();

		 	if($result==''){
		 		echo "用户登录失败!";
		 	}else{
		 		echo $result[0][1]."用户登录成功!";
		 	}                  
		 }

		 //显示用户列表
		 public function userList(){

		 	/**
		 	 *1、获取数据库user表数据
		 	 *   a、先拿到数据库操作对象
		 	 *   b、执行查询数据库操作方法
		 	 *   c、返回数据库数据
		 	 * 2、重定向到显示页面  index.html    index.tpl
		 	 */
		 	
		 	/*链接数据库
		 	执行查询   mysql_query()   select username,passwor from user;
            从返回的结果集中去每一行数据封装到数据    mysql_fetch_assic()
            */


		 	
			//set names=utf8       城  x630   

             //select username,passwor from user as a ,admin as b  where   username='admin' and password='123'  order by id asc limit 1,5




            //$table = array('user','admin');
            
            
            /*
            	javabean   





             */
            $table = 'user';

            //select * from user 
            //控制器只处理业务逻辑
            //
            //
            //根据用户名和密码查询用户数据
            //
            //
            //
            //
            //
            /*
            
             username=java password=456


            username='python'  and password='666'
*/



            //$username = "'java' or 1=1";
            //$username = "java'-- ";
            //$username = 'java\' #';
            //$username = 'java';
            //$password = '666666666666666666666666666666666666';
            $username = 'php';
            $password = '123';

            //sql注入  
            //   预处理  字符串转义  mysql_real_escape_string

            //select * from user where username='php'  and password='123';
            
            $where = array('username'=>$username,'password'=>$password);

            //查询用户
		 	$result = $this->Db->Table($table)
		 	         ->Field("id,username,password")
		 	         ->Where($where)    //"username='python'  and password='666'"
		 	         ->Select();
    		//$select_sql = "select * from user where username=$_POST['username']";
		 	//$resuolt = $this->Db->Query($sql); 

		 	//插入用户        
            /*$this->Db->Table()
                     ->Field()
                     ->Insert();
				*/
			print_r($result);
			exit;
		 	if($result==''){
		 		echo "用户登录失败!";
		 	}else{
		 		echo $result[0][1]."用户登录成功!";
		 	}         

		 	//print_r();
		 	exit;


            




		 }

		/*用户添加逻辑
		  1、获取表单数据
		  2、插入数据库
		  3、显示插入成功提示页面

		*/
		public function userAdd(){
			//第一种方法调用核心类
			/*$result = $this->app['Db']->dbObject->table();
			          $this->app['Page']->pageObject->show();
                       //第二种方法 
			          $this->db->table(); 
			          $this->page->show(); 
                      //第三种方法
                      $this->app['Db']->table();
 					  $this->app['page']->show();
          			  //第三种方法
          			  $config = C('password');//通过config文件获取值
 					  $user = M('User');  //实例化user对象
 					  $user->table()->field()->where()->select();
			*/
		    //查看当前表是否存在
		    //$this->app['Db']->dbObject->table();
		     

		     
		    $return = $this->Db->table();

		    $this->page->show();






            




                /*      $this->db->table();
                      $db->table()
                         ->select()
                         ->where()
                         ->limit()
                         ->orderBy();
			          //page分页对象
			          $this->app['page']->pageObject->show();

			          $page =$this->page->show();*/



 


			/*			
			$userName = $_POST['userName'];
			$passWord = '123';
			$email    = '123@qq.com';

			
			//用户对象就相当于一个对象模型
			//
			
			$user = new UserModel();

			$this->db->createTable();

			$this->db->mysqldb->insert($user);

*/












			/*$result = $this->app['Db']->getName();
			$this->db  :  db核心类对象
			$dbObject  :  db核心类的成员属性，装载的是mysqldb的对象
			table()    :  mysqldb成员方法  
			
			从数据库查询数据
			1、链接数据库
			2、选择表
			3、执行sql查询，返回结果集
			4、遍历结果集数据封装到数组中
			
			
			
			*/
			
			//$this->app['db']  : 数据库对象

            /* 
            标准sql语句
            select * from user where uid = 1;


            控制器：
			$this->db   :当前数据库对象     mysql或者oracle对象
			table()     :查询的表
			select()    ：执行查询操作
			where()     : 执行查询的条件

            $resultArr = $this->db->table('user')       //对表的验证
                     			  ->field('username','password')
                     			  ->where('uid=1')      //过滤条件
                     			  ->select();           //执行sql
            为什么使用对象链方法操作sql，原因可以对sql拆分，进行有效性验证,重组sql         

            


             */


			//$result = $this->db->getAll();

			//echo $result;
		    /*
		    
			数据库封装的目的?
			1、可以对数据库操作模块扩展
			   关系型数据库
					mysql数据库模块     mysql数据库被oracle甲骨文公司收购，mariadb
					oracle数据库模块
					db2数据库模块
			   非关系型数据库
			        redis
			        mongdb
			        hbase  分布式列式数据库    来源是google的bigtable

            2、数据库配置选项
               config选在数据库为mysql、oracle、redis
               接口定义规范和标准
				interface interDb{
					function getAll();
					function getOne();
				}

				class db{
					function getAll(){}
				}

                class  mysqldb extends db{
					funciton getAll(){
										
					}	
					function getOne(){
	
					}
					function select(){
	
					}
                } 
                class  oracledb  extends db{
					function get{
	
					}
                }
                class  redisdb  extends db{
					function getAll(){
						get
					}
                }





		     */


			//获取用户信息
		/*	$userid = array(1,2,3,4);
			$result = $user->getAll($userid);
			print_r($result);
			exit;

			//用户id
			$uid = $this->app['uid'];

			$conn = mysql_connect('localhost','root','');
			mysql_query("set names utf8",$conn);
			mysql_select_db('web_com',$conn);
			$select_sql = 'select * from user where id='.$uid;
			$result = mysql_query($select_sql,$conn);
			while($row=mysql_fetch_array($result)){
				$arr[] = $row;
			}

			print_r($arr);
			exit;*/

			//通过uid查询当前用户信息
			/*
			
			去数据库查
			1、链接数据库
			   mysql_connect()
			2、执行sql语句
			   mysql_query();
			3、sql执行成功后的数据集
			   mysql_fetch_assic()   
			select * from user where uid=1
			


			 */
			 

	 		 
			//$su = "恭喜成功找到控制器!";
		    //$page->show();
			//echo $su;
			//$this->eat();
			//$page->show(5);

			//assign("succ",$su);
			//$tpl->display();
			//
			/*
			显示用户
			1、数据库获取所有用户
			2、分页显示用户
			3、显示到前端页面
			 */
			 
			// $result = $model->getALL($this->uid);
			//           $model->table('cat')
			//                 ->filed('name','password','pid')
			//                 ->where('uid=1')
			//                 ->limit(8)
			//                 ->order()
			//                 ->select();
			// $resu = $page->show($result);
			// $this->display($resu);

			

		}
		public function eat(){
			echo "中午和".$this->name."吃回锅肉";
		}
	}
 	


 	 




/*class Person{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	public function getName(){

		echo $this->name;
	}
	public static function set(){

		$this->name = $name;
	}
}
class Student extends Person{
	public function getName(){
		echo $this->name;
	}
}

$s = new Student('吴家林');

//把名字外部传到方法内部   吴家林
//1、构造函数初始化参数
//2、对象调用成员属性赋值
//3、通过成员方法初始化
//4、通过成员方法参数传值初始化
$name = '吴家林';
$p = new Person($name);
$p->set('吴家林',10,199);
$p->name = '吴家林';
$p->getName();*/


