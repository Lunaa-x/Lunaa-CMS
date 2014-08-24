<?php

if (isset($_POST['credentials.email']) && isset($_POST['credentials.password']))
{
	$username = $_POST['credentials.email'];
	$password = $_POST['credentials.password'];
	
	$result = Core::getUsers()->login($username, $password);
	
	if ($result == 0)
	{
		$_SESSION['ERROR'] = 'Email not found.';
	}
	else if ($result == 1)
	{
		$_SESSION['ERROR'] = 'Wrong password.';
	}
}

?>