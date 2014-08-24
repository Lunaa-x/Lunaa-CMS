<?php

include('includes/global.php');

if (Core::isLoggedIn())
{
	header('Location: ' . Core::getConfig()->getWebsiteValue('link') . '/me');
}

if (isset($_POST['credentials_email']) && isset($_POST['credentials_password']))
{
	$username = $_POST['credentials_email'];
	$password = $_POST['credentials_password'];
	
	$result = Core::getUsers()->login($username, $password);
	
	if ($result == 0)
	{
		$error = 'Email not found.';
	}
	else if ($result == 1)
	{
		$error = 'Wrong password.';
	}
}

Core::getTemplate()->addParam('{footer}', file_get_contents('includes/templates/footer.tpl'));

if (isset($error) && !empty($error))
{
	Core::getTemplate()->addParam('{error}', '<div class="action-error flash-message"><div class="rounded-container"><div style="background-color: rgb(0, 0, 0);"><div style="margin: 0px 4px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(131, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(190, 0, 22);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(219, 0, 25);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div></div></div><div style="margin: 0px 2px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(133, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(225, 0, 26);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(169, 0, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(133, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(225, 0, 26);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(131, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(190, 0, 22);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(219, 0, 25);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div><div class="rounded-done"><ul>
		' . $error . '</ul></div><div style="background-color: rgb(0, 0, 0);"><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(219, 0, 25);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(190, 0, 22);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(131, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(225, 0, 26);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(133, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div><div style="margin: 0px 1px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(169, 0, 19);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div><div style="margin: 0px 2px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(133, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(225, 0, 26);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div></div><div style="margin: 0px 4px; height: 1px; overflow: hidden; background-color: rgb(0, 0, 0);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(131, 0, 15);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(190, 0, 22);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(219, 0, 25);"><div style="height: 1px; overflow: hidden; margin: 0px 1px; background-color: rgb(226, 0, 26);"></div></div></div></div></div></div></div></div>');
}

Core::getTemplate()->addFile('frontpage');
Core::getTemplate()->output();

?>