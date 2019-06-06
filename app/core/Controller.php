<?php 
/*
   核心类控制器文件

 */
   class Controller{
   		//核心累对象属性
   		public $app;
   		/*
   		构造函数，初始化控制器类
   		 */
   		public $db;
   		public function __construct($configArr='',$singArr=''){
   			$this->configArr = $configArr; 
            //$this->singArr = $singArr;
           
           // $this->db    = $singArr['Db']->dbObject;
           // 
          // print_r($singArr);
            if($singArr!=''){
               foreach($singArr as $key=>$value){
                  
                  //判断object这个key值是否存在在数组中
                  
                 if(!array_key_exists('Object',$value)){
                     $this->$key = $value; 
                     continue;
                 }
                 $this->$key = $value->Object;
                 
                 
                 
               }   
            }
            


           // print_r($singArr);
           // exit;
            //$this->db    = $singArr['db']->dbObject;
            //$this->page  = $singArr['page'];
            //$this->tree  = $singArr['tree'];
   		}

      //核心类对象封装
      public function coreObject(){}

      //获取数据总行数
      public function getTotalRow($table=''){
        $this->Db->Table($table)->Select();
        return $this->Db->count;
      }

      //获取分页
      public function getPage(){
        return !isset($this->UrlFilter->appPar['page'])?1:$this->UrlFilter->appPar['page'];
      }

      //获取排序方式
      public function getOrder(){
        return !isset($this->UrlFilter->appPar['order'])?'asc':$this->UrlFilter->appPar['order'];
      }

      //提示页面
      public function Notice($info,$path){
        //提示信息
        $this->Tpl->assign("info",$info);
        //跳转路径
        $this->Tpl->assign("path",$path);
        $this->Tpl->display("notice.tpl");
      }
   }