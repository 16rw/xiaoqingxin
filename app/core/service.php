<?php

	/*加载核心类文件
	  url解析类
	  db驱动类
	  smarty引擎类
	  congfig配置类
	  tree型结构类
	  文件读取类

	  高类聚  低耦合
	*/
	class Service{
		//定义配置文件路径
		public static $configPath = '/app/config/config.setting.php';
		//定义配置文件
		public static $configArr;
		//对象容器
		 
		public static $singleArr = array();
		/**
		 * 加载核心类
		 * 
		 * @return [type] [description]
		 */
		
		public function __construct(){
			//引入异常类文件
			 require ROOT."/app/Exception/MsgException.php";
		}
		
		public static function  loadCore(){

			//引入配置文件
			 
			//判断当前配置文件是否存在
			if(file_exists(ROOT.self::$configPath)){
				
				self::$configArr = require ROOT.self::$configPath;
				//文件数组是否存在
				if(isset(self::$configArr) && !is_null(self::$configArr)){
					
					//加载核心配置类文件,检测core数组是否存在配置文件
					if(array_key_exists('core', self::$configArr)){
						//遍历核心类
						foreach(self::$configArr['core'] as $key=>$value){

							//判断是否核心类存在
							//引入核心类文件								     
                            $index = strpos($value,'/');
                             //核心类模块接口加载
                            if($index>0){
                             	if(file_exists(ROOT."/app/core/".$value.".interface.php")){
                             		require ROOT."/app/core/".$value.".interface.php";
                             	}else{
                             		throw new MsgException($value,1004);
                             	}
                             //核心类加载		
                            }else{
                             	if(file_exists(ROOT."/app/core/".$value.".php")){                 
									require ROOT."/app/core/".$value.".php";
									//实例化核心类对象
									//单列模式实现模块对象初始化
		                            // 单例模式实现对象容器存储
		                            if(!isset(self::$singleArr[$value]) ||  is_null(self::$singleArr[$value])){
		                            	self::$singleArr[$value] = new $value(self::$configArr);
		                            }  	
								}else{   
									throw new MsgException($value,3001);
									 
								}
                            }							
						}
						 
						 
					}else{
						//echo "配置文件加载核心类选项不存在!";
						throw new MsgException('core',1009);
					}
					
				}else{
					//echo "配置文件数组不存在或者没有设置!";
					throw new MsgException(self::$configArr,1002);  
					//throw new MsgException("配置文件数组不存在或者没有设置!");  
				}
			}else{
				 
				throw new MsgException(self::$configPath,1001);  
				//throw new MsgException("配置文件不存在!");     
				 
			}
			/*$url = new Url();
			$db  = new Db();
			$tree = new Tree();*/
		}

		/*
		
		 */
		
		public static  function  run(){
			//$obj = new Service('php');

			new self;
			 
			//加载异常类
			//require ROOT."/app/Exception/MsgException.php";
			//加载核心类文件
		    


		    self::loadCore();
		    //url路径解析
			self::$singleArr['UrlFilter']->getUrlFilter(self::$singleArr);
		    /*try{
		    	self::loadCore();
		    	//url路径解析
				self::$singleArr['UrlFilter']->getUrlFilter(self::$singleArr);
		    }catch(MsgException $e){
		    	echo $e->getMessage();
		    	$e->deal();
		    }*/
			
		 
			

		}
	}



