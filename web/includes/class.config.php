<?php

class Config
{
	private $mySQL = null;
	private $socket = null;
	private $website = null;
	
	public function Config()
	{
		$this->mySQL = array
		(
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'idk'
		);
		
		$this->socket = array
		(
			'ip' => '127.0.0.1',
			'port' => 30000
		);
		
		$this->website = array
		(
			'link' => 'http://127.0.0.1/web'
		);
	}
	
	public function getMySQLValue($key)
	{
		return $this->mySQL[$key];
	}
	
	public function getSocketValue($key)
	{
		return $this->socket[$key];
	}
	
	public function getWebsiteValue($key)
	{
		return $this->website[$key];
	}
}

?>