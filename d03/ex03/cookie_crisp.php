<?php 
	session_start(); //start session for cookies

	function ft_array_key_exists($key, array $array)
	{
		foreach ($array as $k => $v) {
			if ($k === $key)
				return true;
		}
		return false;
	}
	function create_cookie($name_cookie, $value)
	{
		setcookie($name_cookie, $value, time() + 365*24*3600, null, null, false, true);
	}
	function read_cookie($name_cookie)
	{
		if (ft_array_key_exists($name_cookie, $_COOKIE) == false)
			continue;
		else
		{
			echo $_COOKIE[$name_cookie];
			echo "\n";
		}
	}
	function delete_cookie($name_cookie)
	{
		setcookie($name_cookie, "", time() - 3600, '/');
	}

	if (ft_array_key_exists('action', $_GET))
		$action = $_GET['action'];
	else
		continue;
	if (ft_array_key_exists('name', $_GET) == true)
		$name_cookie = $_GET['name'];
	else
		continue;
	$value = $_GET['value'];
	if ($action == "set")
	{
		if (ft_array_key_exists('value', $_GET) == true)
			create_cookie($name_cookie, $value);
		else
			continue;
	}
	else if ($action == "get")
		read_cookie($name_cookie);
	else if ($action == "del")
		delete_cookie($name_cookie);
	else
		continue;
?>