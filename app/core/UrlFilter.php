<?php
	/*url路径解析器*/
	class UrlFilter{
		//url控制器路径
		public $path;
		//定义控制器
		public $Controller;
		//控制器对象
		public $ControllerObj;
		//控制器方法
		public $ControllerMethod;
		//参数属性
		public $appPar = array();
		public function __construct($configArr=''){
			$this->configArr = $configArr;
		}
		/**
		 *过滤url路径，指向控制器 ,通过此方法过滤url路径
		 */
		
		public function getUrlFilter($singArr){
			/*
			1、获取url控制器路径
			2、判断控制器文件是否存在，存在导入控制器
			3、判断类是否存在，如果存在实例化对象
			4、判断方法是否存在于类中，如果存在则调用方法，不存在提示方法不存在
			 */

			//获取url控制器路径
			$this->path = $_SERVER['REQUEST_URI'];
			$pathArr = explode('/',$this->path);
		    
			

			//如果路径为空，则默认为index控制器
			
			//控制器默认index
			if($pathArr[2]!='?'){
				$this->Controller       = 'IndexController';
				$this->ControllerMethod = 'Index';
			//指向url定义的控制器	
			}else{
				$this->Controller       = $pathArr[3].'Controller';
				$this->ControllerMethod = $pathArr[4];
			}

			//url参数处理
			$length = count($pathArr);
		 

			/*$res = array(); 
			//贺兴玲   蹇思思   王倩
			$res = '贺兴玲';
			$res[1] = '蹇思思';
			print_r($res);
			exit;
			$appPar = array('sid'=>1,'cid'=>5,'pid'=>3);
            */
			
			for($i=5;$i<$length;$i++){
				//$appPar .= $pathArr[$i].'=>'.$pathArr[$i+1]."<br>";
				$this->appPar[$pathArr[$i]]=$pathArr[$i+1];				
				$i++;
			}

			
			//判断控制器文件是否存在，存在导入控制器
			if(file_exists(ROOT.'/app/controller/'.$this->Controller.'.class.php')){
				require ROOT.'/app/controller/'.$this->Controller.'.class.php';
				//判断类是否存在，如果存在实例化对象
				if(class_exists($this->Controller)){
					//实例化对象 
				   
					$this->ControllerObj = new $this->Controller($this->configArr,$singArr);
					//判断方法是否存在于类中，如果存在则调用方法，不存在提示方法不存在
					if(method_exists($this->ControllerObj, $this->ControllerMethod)){
						 //控制器对象调用控制器方法
						
						//$action = $this->ControllerObj;
						$method = $this->ControllerMethod;
						$this->ControllerObj->$method();


					}else{
						//echo $this->ControllerMethod.'不存在!';
						throw new MsgException($this->ControllerMethod,2002);  
					}
				}else{
					//echo $this->Controller.'不存在!';
					throw new MsgException($this->Controller,2001);  
				}
			}else{
				//echo $this->Controller.'控制器不存在!';
				throw new MsgException($this->Controller,2001);  
			}
			 


		}
		 
	}
