<?php
	/*
	模板文件核心类
	 */
	
	class Tpl{
		//smarty模板对象
		public $Object;
		//配置文件
		public $configArr;
		//定义模板引擎文件路径
		//
		public static $SmartyPath = '/app/Lib/Smarty/Smarty.class.php';
		//通过配置文件驱动数据库操作类
		public function __construct($configArr=''){
			$this->configArr = $configArr;
			
			$this->loadSmartyObject();
		}

		//加载smarty类
		public function loadSmartyObject(){
			 

			 //判断smarty引擎是否存在
			 if(!file_exists(ROOT.self::$SmartyPath)){
			 	throw new MsgException(ROOT.self::$SmartyPath,5001);
			 }
            //引入smarty类
			require ROOT.self::$SmartyPath;
			$this->Object = new Smarty();

			$this->Object->template_dir = 'html/templates/';    //模板文件
			$this->Object->compile_dir = 'html/templates_c/';   //模板编译文件 ，这个文件可以任意删除	
			//smarty定界符
			$this->Object->left_delimiter = '<{';
			$this->Object->right_delimiter = '}>';
			
			$this->Object->assign("WEBURL",$this->configArr['webInfo']['host']);
			$this->Object->assign("WEBTITLE",$this->configArr['webInfo']['title']);
		}
	}
?>