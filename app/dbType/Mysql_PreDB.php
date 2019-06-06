<?php
	/*
	mysql数据库驱动类
    


    rwx

    object   上帝
	 */
	class Mysql_PreDB extends Db implements InterDb{
		
		public $dbSource;   //数据库资源		
		public $LinkSource;   //链接mysql对象属性		
		public $username;     //数据库用户名
		public $password;    //数据库密码
		public $host;         //主机地址
		public $port;         //链接数据库端口
		public $charset;      //数据库编码
		public $dbName;      //数据库名称
		public $ExeType;      //sql执行类型
		public $stmt;         //返回sql预处理语句对象
		public $ResultData;   //返回数据的结果集
		public $where;       //条件
		public $wherePar;
		public $ResultInsertId;  //插入数据后返回的最后一条记录id
		public $delimiter;
		public $field;
		public $order;


		 
		public function __construct($configArr=''){ 
			//链接数据库配置信息初始化
			$this->host     = $configArr['db']['host'];
			$this->username = $configArr['db']['username'];
			$this->password = $configArr['db']['password'];
			$this->port     = $configArr['db']['port'];
			$this->charset  = $configArr['db']['charset'];
			$this->dbName  = $configArr['db']['dbName'];
			

			 
			

			
			 
				
		}
		/*
			批量删除
		*/
		/*

		*/
		public function whereIn($arr)
		{
			
		}
		public function delAll()
		{
			
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
		    	$this->ExeType = 1;
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
		 * Query:执行有两种情况
		 *       $sql = "select * from user where password=123 and username=123"
		 *       第一种直接在控制器中调用Query($sql)
		 *       第二种使用对象链调用Query()
		 */
		public function Query($sql=''){
			//query();执行sql查询
			// 清除sql标识
			$this->Free();
			//链接mysql
			$this->Connect();
		  	//判断当前sql执行的类型是什么？
		  	//print_r ($sql);
		  	//exit;
		  	
			if($sql!=null){
				 //向mysql数据库发送一个预处理语句
				
				$this->stmt = $this->LinkSource->prepare($sql);
				/*
				两种情况：
				     第一种：直接执行sql语句，不需要参数
				     第二种：需要绑定参数执行sql
				 */
 
			 
			}else{
				//向mysql数据库发送一个预处理语句
				$this->stmt = $this->LinkSource->prepare($this->sql);
				
			}
		    

			//判断当前sql是否绑定参数
			if($this->where!=null){
				//绑定预处理语句的参数
			   $type = '';
		 

			   foreach($this->wherePar  as $key=>$value){
			       if(is_string($value)){
			          $type .= 's';
			       }else if(is_int($value)){
			          $type .= 'i';
			       }
			   }
			 
			   
			    //1、必须绑定变量
			    //2、bind_param和绑定变量值有关
			     
			   	$arr = array();
				array_push($arr, $type);
				//便利用户数据信息取地址
				foreach ($this->wherePar as $key => $value) {
					$arrValue[] = &$this->wherePar[$key];
				}

				//把$arrValue放进$arr数组里
				$arrResult = array_merge($arr,$arrValue);
				
				//$stmt->bind_param($type,$name,$pass,$id);
				//回调函数绑定参数
				//@print_r($sql);
				//print_r($this->stmt);
				//print_r($arrResult);
				call_user_func_array(array($this->stmt,'bind_param'),$arrResult);
			}
			//执行sql
			$this->stmt->execute();


			//print_r($this->ExeType);
		  	switch($this->ExeType){
		  		case 1:
                        
		  		       //返回预处理语句结果的数据集
		  		       $result = $this->stmt->get_result();
		  		       
		  		       $num = $result->num_rows;
		  		      
		  		       if($num>0){
		  		       	  while ($row = $result->fetch_array(MYSQLI_NUM)){
							//$this->ResultData = $row;
							$this->ResultData[] = $row;

				          }	
				          $this->count = count($this->ResultData);
		  		       }else{
		  		       	    $this->ResultData = 0;
		  		       }
		  		       break;
		  		case 2:
		  		       //插入数据	返回插入语句影响行数
		  		       $this->ResultInsertId = $this->stmt->insert_id;
		  		       
		  		       break;
		  		case 3:
		  		       //删除数据	返回插入语句影响行数
		  		       $this->ResultDelete = $this->stmt->affected_rows;
		  		       
		  		       break;
		  		case 4:
		  		       //修改数据	返回插入语句影响行数
		  		       $this->ResultUpdate = $this->stmt->affected_rows;
		  		       
		  		       break;
		  		default:
		  		       //表达式3;
		  		       break;	       

		  	}
			
            unset($this->sql);             //sql语句
            unset($sql);
			/*while($row=$this->ResultSource->fetch_assoc()){
				$this->ResultData[] = $row;
			}
			print_r($this->ResultData[]);
			wxit;*/
				 
 
		}

		/*
		条件
		 */
		public function Where($where='',$like=''){
			$whereStr = '';
			if(is_array($where)){
				$count = count($where);
				$i = 0;
				foreach($where as $key=>$value){
					$i++;
					//$whereStr .=$key.'=\''.$value.'\'';
					if($i!=$count){
						$whereStr .=$key.'=? and ';	
					}else{
						if($like==''){
							$whereStr .=$key.'=?';
						}else{
							$whereStr .=$key.' like ?';
						}
							
					}
				}
			}
			//数组数据
            $this->wherePar = $where;
            //字符串条件
			$this->where = $whereStr;
			
			if(is_string($where)){
				//explode($where, '=')
				$this->where = $where;
			}
			return $this;
		}	

		/*删除*/
		public function Delete(){
			$delete_sql = "delete from ".$this->table." where ".$this->where;
			$this->where = null;
			$this->ExeType = 3;
			$this->Query($delete_sql);
			return $this->ResultDelete;
		}	
		/*修改*/
		public function Update($value){
			//封装key和value
			foreach ($value as $k => $v) {
				$this->field .= $k.'=?,' ;
				
			}
			$this->field = substr($this->field,0,-1);
			
		    $update_sql = "update user set ".$this->field ." where ".$this->where;
			$this->ExeType = 4;
		    $par = $this->wherePar;
		    foreach ($par as $key => $v) {
		    	$value[$key] = $v;
		    }
		    $this->wherePar = $value;
		    $this->where = $this->where;
			$this->Query($update_sql);
			return $this->ResultUpdate;
		}

		/*
		查询
		 */
		public function Select(){
			$this->sql = 'SELECT ';
			$order = empty($this->order)?'asc':$this->order;
			if(!isset($this->field)){
				$this->field = '*';
			}
			if(!isset($this->limit)){
				$this->limit = '';
			}

			//封装sql语句
			if($this->where){
				$this->sql .= $this->field .' FROM '.$this->table .' WHERE '.$this->where.' order by id '.$order." ".$this->limit;
				//$this->sql .= $this->field .' FROM '.$this->table .' WHERE '.$this->where;
			}else{
				
				$this->sql .= $this->field .' FROM '.$this->table.' order by id '.$order." ".$this->limit;
			}

			$this->ExeType = 1;
			 
			$this->Query();
			
			return $this->ResultData;

			//$sql = "select * from user";
			//$this->dbSource->query($sql);
			//执行sql查询
			//$this->dbSource
			//return $result;
		}

		/**
		 * 预处理语句绑定参数类型方法
		 */
		public  function BandParaRef($parArr){
			$type = NUll;
			foreach ($parArr as $key => $value) {
				if(is_string($value)){
					$type .= 's';
				}else if(is_int($value)){
					$type .='i';
				}
			}
			$arr = array();
			array_push($arr, $type);
			//遍历用户数据信息取地址
			foreach ($parArr as $key => $value) {
				$arrValue[] = &$parArr[$key];
			}
			//把$arrValue放进$arr数组里
			$arrResult = array_merge($arr,$arrValue);
			return $arrResult;
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
			$this->selectDb = $this->LinkSource->select_db($this->dbName);
			if(!$this->selectDb){
				throw new MsgException($this->dbName, 3003);
				
			}	 

			
		}
		/*
		字段
		 */
		public function Field($field='*'){
			$this->field = $field;
			return $this;
		}
		

		/*添加*/
		public function insert($value){
			//封装key和value
			foreach ($value as $k => $v) {
				$this->field .= $k.',' ;
				$this->delimiter .= '?'.',';
			}
			$this->field = substr($this->field,0,-1);
			$this->delimiter = substr($this->delimiter,0,-1);
		    $insert_sql = "insert into user ({$this->field}) values({$this->delimiter})";
		    $this->wherePar = $value;
		    $this->where = $this->delimiter;
		    $this->ExeType = 2;
			$this->Query($insert_sql);
		}



		/**
		 * 条件语句值得验证
		 */
		
		public function GuardValue(){

		}

		/*排序*/
		public function Order($order='asc'){
			$this->order = $order;
			return $this;
		}

		/*通过偏移量取值*/
		public function Limit($offset,$pageNum){
			$this->limit = "limit {$offset},{$pageNum}";
			return $this;
		}

		
	}
 