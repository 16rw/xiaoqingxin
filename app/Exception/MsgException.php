<?php
	/**
	 * 异常处理类
	 */
	class MsgException extends Exception{
		private static $errorInfoTmp = '/app/showInfo/errorInfo.php';
		//初始化异常类对象\
		/*public function __construct($mess='',$code=''){
			//parent::__construct($mess,$code);
		}*/

		public function deal(){

		}

		public function __toString(){
			//输出对象的字符串
			//需要重新封装异常数据输出内容
			//
			//1、获取异常错误信息配置文件的内容
			//2、读取模板内容,字符流内容    file_get_content();
			//3、获取异常错误信息,   getMessage();  ,获取异常错误代码   getCode()
			//4、替换异常错误信息的内容  str_replace(查找字符串内容，替换的内容，异常配置文件内容);
			//5、替换模板文件的异常错误信息内容
			//6、输出模板错误提示内容die()
			//
			//
			$errorInfoArray = require ROOT."/app/config/errorInfo/error_en.php";
			
			$mess = $this->getMessage();
			$result = $this->getCode();
			 
			//模板文件字符串替换
		    $result = str_replace("s%",$this->getMessage(),$errorInfoArray[$this->getCode()]);
		    $ExceptionInfoTemp = file_get_contents(ROOT.self::$errorInfoTmp);
		   
		    $result = str_replace('[ErrorInfo]',str_replace("s%",$this->getMessage(),$errorInfoArray[$this->getCode()]),$ExceptionInfoTemp);
		    die($result);
			//echo 
			exit;

		}
		


	}
