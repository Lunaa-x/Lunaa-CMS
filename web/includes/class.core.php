<?php

class Core
{
	private static $config = null;
	private static $database = null;
	private static $users = null;
	private static $news = null;
	private static $template = null;

	public static function includeFiles() 
	{
		include('class.config.php');
		include('class.database.php');
		include('class.users.php');
		include('class.news.php');
		include('class.template.php');
	}
	
	public static function setVariables()
	{
		self::$config = new Config();
		
		DB::$user = self::$config->getMySQLValue('username');
		DB::$password = self::$config->getMySQLValue('password');
		DB::$dbName = self::$config->getMySQLValue('database');
		
		self::$database = new MeekroDB();
		self::$users = new Users();
		self::$news = new News();
		self::$template = new Template();
	}
	
	public static function isLoggedIn()
	{
		return isset($_SESSION['IDK_USER']);
	}
	
	public static function getConfig()
	{
		return self::$config;
	}
	
	public static function getDatabase()
	{
		return self::$database;
	}
	
	public static function getUsers()
	{
		return self::$users;
	}
	
	public static function getNews() 
	{
		return self::$news;
	}
	
	public static function getTemplate()
	{
		return self::$template;
	}
}