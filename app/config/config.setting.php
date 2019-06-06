<?php             //站点信息配置管理选项
	return array("webInfo"=>array(
	                                'title'=>'小清新框架后台管理系统',
									'host' =>'http://localhost/web_com/',
									'port' =>'80'
									
	                         ),
				  //核心加载类配置管理
				  'core'=>array(
				  			/*引入模块*/
				  			'interface/InterDb',
				  			'interface/InterSmarty',
                            /*引入核心类*/
				  			'UrlFilter',   //url过滤器
				  			'Controller',   //控制器
							//'Tree',
							'Db',
							'Page',
							'Tpl'         //模板引擎类    
							 
							
				  ),	
				  //分页配置信息
				  'page'=>array(
				  		'pageNum'=>3,  //每页显示的个数
				  		'between'=>3   //分页区间
				  	),		 
				  //数据库配置信息管理
				  'db'=>array(
				  			  'host'=>'p:localhost',
							  'dbName'=>'web_com',	
				  	          'username'=>'root',
							  'password'=>'',
							  'port'=>3306,
							  'dbType'=>'Mysql_Pre',
							  //'dbType'=>'Mysql',
							  'charset'=>'utf8'
				  )
	             )
?>