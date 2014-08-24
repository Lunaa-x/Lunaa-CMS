<?php

class Users
{
	private $salt = '"$2y$14$wHhBmAgOMZEld9iJtV./aq';

	public function getUser($email)
	{
		return Core::getDatabase()->queryFirstRow('SELECT * FROM `players` WHERE `email` = %s', $email);
	}
	
	public function login($email, $password)
	{
		$user = $this->getUser($email);
	
		if (is_null($user))
		{
			return 0;
		}
		else
		{		
			if ($user['password'] === /*$this->hash(*/$password/*)*/)
			{
				$_SESSION['IDK_USER'] = $user;
				
				header('Location: ' . Core::getConfig()->getWebsiteValue('link') . '/me');
			}
			else
			{
				return 1;
			}
		}
	}
	
	public function hash($password)
	{
		return crypt($password, $this->salt);
	}
	
	public function getValue($key)
	{
		return $_SESSION['IDK_USER'][$key];
	}
}

?>