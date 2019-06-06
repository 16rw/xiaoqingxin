<?php
	/*
	数据库接口
	 */
	interface InterSmarty{
		function getAll();
		function table();
		function select();
		function field();
		function where();
	}