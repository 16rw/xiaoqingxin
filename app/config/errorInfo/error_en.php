<?php
   /** 
       错误信息内容 
        
    */
	return array(
    	//核心类文件异常错误信息   service.php
    	1001=>"This s% configuration file is not present",
    	1002=>"This s%configuration file and array are not present or didn't set",
        1003=>'Core class file named s%  has failed to load!',
        1004=>'核心模块接口s%不存在!',
        1009=>'s%配置文件加载核心类选项不存在!',


    	1009=>"The configuration file loading core class options is not present",


    	//url过滤器，控制器定向异常错误信息   urlFilter.php
    	2001=>"This s% controller is not present",
        2002=>"controller s% method is not present",

    	//数据库异常错误信息   db.php
    	//
    	3001=>"The database connection failed"
        3002=>'主机地址不能为空!',
        3003=>'数据库sql:s%执行错误',
        3004=>'选择s%数据库失败',
        30012=>'s%数据库表不存在',

        //模板引擎错误提示
        5001=>'s%模板引擎文件不存在!',

	)
?>