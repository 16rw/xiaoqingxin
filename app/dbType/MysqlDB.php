<?php
	/*
	mysql数据库驱动类
    


    rwx

    object   上帝
	 */
	class MysqlDB extends Db implements InterDb{
		
		public $dbSource;   //数据库资源		
		public $LinkSource;   //链接mysql对象属性		
		public $username;     //数据库用户名
		public $password;    //数据库密码
		public $host;         //主机地址
		public $port;         //链接数据库端口
		public $charset;      //数据库编码
		public $dbName;      //数据库名称


		 
		public function __construct($configArr=''){
			//链接数据库配置信息初始化
			$this->host     = $configArr['db']['host'];
			$this->username = $configArr['db']['username'];
			$this->password = $configArr['db']['password'];
			$this->port     = $configArr['db']['port'];
			$this->charset  = $configArr['db']['charset'];
			$this->dbName  = $configArr['db']['dbName'];
			

			 
			

			
			 
				
		}

		public function getAll(){
			echo "获取所有数据";
		}
		/*
		表方法

		 */
		public function Table($table){
			//验证参数是字符串还是数组
			//show tables like "表名"   
			//判断表名是否存在
			
		    if(is_string($table)){
		    	//执行sql询问mysql表是否存在
		    	//首先链接数据库   选择数据库     设置编码   执行query()
		    	$this->Query("show tables like '{$table}'");

				if($this->ResultData==NULL){
					throw new MsgException($table,30012);	
				}else{
					$this->table = $table;
				}
		    	 
		    }

		    
		    return $this;
		}

		/**
		 * 向数据库询问  执行sql查询
		 * @return [type] [description]
		 */
		public function Query($sql=''){
			//query();执行sql查询
			// 清除sql标识
			$this->Free();
			//链接mysql
			$this->Connect();
		 
			if($sql!=null){
				//返回数据结果集标识
			 
				$this->ResultSource = $this->LinkSource->query($sql);
                //从结果集当中取一行
                  
				
				while($row=$this->ResultSource->fetch_assoc()){
					$this->ResultData[] = $row;
				}

			 
			}else{
				//返回数据结果集标识
			  	//print_r($this->sql);
				$this->ResultSource = $this->LinkSource->query($this->sql);
                if($this->ResultSource){
                	while($row=$this->ResultSource->fetch_assoc()){
						$this->ResultData[] = $row;
					}
                }else{
                	throw new MsgException($this->sql,3003);
                }
                
				
			}
            unset($this->sql);             //sql语句
			/*while($row=$this->ResultSource->fetch_assoc()){
				$this->ResultData[] = $row;
			}


			print_r($this->ResultData[]);
			wxit;*/
				 
 
		}

  		//清除链接数据库标识
		public  function Free(){
			if($this->LinkSource!=null){
				$this->LinkSource->close();   //关闭数据库
				$this->LinkSource=null;      //清空数据库对象
	
			}
			unset($this->ResultData);     //返回结果集
			//
			unset($this->ResultSource);   //返回query结果集资源


		}
		public function Connect(){
 
			if(is_null($this->host))  throw new MsgException("", 3002);
			if(is_null($this->username))  throw new MsgException("", 3002);
			//if(!is_null($this->password))  throw new MsgException("", 3002);
			if(is_null($this->port))  throw new MsgException("", 3002);
			$this->LinkSource = new mysqli($this->host,$this->username,$this->password);
			//选择数据库
			$this->LinkSource->select_db($this->dbName);

			
		 
		 
			//

			
			
		}
		/*
		字段
		 */
		public function Field($field='*'){
			$this->field = $field;
			return $this;
		}
		/*
		条件
		 */
		public function Where($where=''){
			if(is_array($where)){

				foreach($where as $key=>$value){
					$whereStr .=$key.'=\''.$value.'\'';
				}
				print_r($whereStr);
				exit;
			}


           die("ss");


			$this->where = $where;
			return $this;
		}
		/*
		查询
		 */
		public function Select(){

			//封装sql语句
			$this->sql = 'SELECT ';
			

			$this->sql .= $this->field .' FROM '.$this->table .' where '.$this->where;


			$this->Query();
			return $this->ResultData;
			
			 



			//$sql = "select * from user";
			//$this->dbSource->query($sql);
			//执行sql查询
			//$this->dbSource
			//return $result;
		}

		public function insert($user){

		}



		/**
		 * 条件语句值得验证
		 */
		
		public function GuardValue(){

		}

		
	}
 