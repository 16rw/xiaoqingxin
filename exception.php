<?php


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
      */
    
    //吴家林上课
    //
    //
    
    run($c){

    	if($c){
    		throw new Exception("掉坑里了");
    	}
    }


    
    class MsgException extends Exception{
      public function __construct(){
          parent::__construct()
      }
    	public  function deal(){
         parent::getMessage();




    	}
      public function __toString(){

      }
    }

  // 起床上课异常类
  class MsgException extends Exception{
      public function __construct(){
          parent::__construct()
      }
      public  function deal(){
         parent::getMessage();




      }
      public function __toString(){

      }
    }



    $b = false;
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
        public function getUp($num){
           if($num==1){
              echo "起床上课!";
           }else{
              throw new GetUpException("闹钟没响");
           }

        }
    }
    $p = new Person('吴家林',19);
    try{

       //捕获多个异常  墨菲定律
       /*正常          异常           解决办法
       早晨起床        闹钟没响       备用闹钟
       刷牙洗漱        停水了         用矿泉水刷牙
       吃早饭          饭卡没钱       问同学借钱  
       骑车上课        掉坑里了       拿梯子爬上来
       上课
       */
      $p->getUp(0);

      echo "早晨起床<br>";
     // 
      if($b==false){
      	 throw  new MsgException("停水了"); 	 
      }else{
         echo "刷牙洗漱<br>";
      }
      
      
      echo "吃早饭<br>";
      //echo "骑车上课<br>";
      run();
      echo "上课<br>";





    }catch(MsgException $e){
        echo $e->getMessage();

        $e->deal();
        echo "用矿泉水刷牙<br>";
    }catch(GetUpException $e){
        $e->deal();
    }catch(Exception $e){
        $e->getMessage();
    } 

