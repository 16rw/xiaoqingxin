<?php
/**
	数据库核心类  目的：驱动数据库类   mysql   oracle

*/
 
	class Db{
		//数据库对象
		public $Object;
		//配置文件
		public $configArr;
		//通过配置文件驱动数据库操作类
		public function __construct($configArr=''){
			$this->configArr = $configArr;
			
			$this->loadDbObject();
		}

		//加载数据库类
		public function loadDbObject(){
			//引入数据库驱动类
			//实例化驱动类
			//让当前对象属性指向这个驱动类
			 


 	       /**
 	        * 1、遍历dbType文件目录是否有非法文件存在      如果有后缀、扩展名为.exe  .bat  .sh    则非法,相反如果文件都为.php 则目录安全
 	        * 2、opendir();打开一个文件句柄    
 	        * 3、读取文件数据流   readdir()
 	        * 4、判断当前是否为目录或文件
 	        * 5、如果是目录递归，否则获取文件的扩展名，判断是否为.php     如果不是删除
 	        * 6、导入数据库操作类文件
 	        */
            	
            //调用scanDbDir检测
            $this->scanDbDir();
			require ROOT.'/app/dbType/'.$this->configArr['db']['dbType'].'DB.php';
			

			//print_r(ROOT.'/app/dbType/'.$this->configArr['db']['dbType'].'DB.php');
			//exit;
			
			$db = $this->configArr['db']['dbType'].'DB';
			
			$this->Object = new $db($this->configArr);
			if (!$this->Object instanceof InterDb) {
   				throw new MsgException('',3001);
			} 


		}




		//数据库文件安全目录扫描
		public function scanDbDir($path=''){
			if($path!=''){
				$path = ROOT."\app\dbType\\".$path;
			}else{
				$path = ROOT."\app\dbType";
			}	
			$od = opendir($path); //打开一个文件句柄，打开文件的数据流
			readdir($od);
			readdir($od);
			while($dirStr=readdir($od)){    
				$newPath = $path."\\".$dirStr;                   
				//判断是否为目录
				if(is_dir($newPath)){
					//递归
					$this->scanDbdir($dirStr);
				}else{
					$extention = pathinfo($dirStr);
					if($extention['extension']!='php'){
						throw new MsgException($dirStr,4001);
					} 
				}
			}	
		}


		public function getDbObject(){
			/**
			 * 步骤
			 * 1、加载数据库类
			 * 2、实例化数据库
			 * 3、实例化数据库对象赋值给db类的成员属性
			 */
			echo "我是数据库对象";
		}
	}
/**
print_r(class_implements($db));
			exit;
			if($res=class_implements($db)){
				$exit = in_array('InterDb', $res);
				if($exit){
					die("是");
				}else{
					die("否");
				}
			}else{
				die("没有接口");
			}
 */