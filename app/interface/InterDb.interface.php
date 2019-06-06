<?php
	/*
	数据库接口
	 */
	interface InterDb{
		function getAll();
		function table($table);
		function select();
		function field();
		function where();
		function query();
	}