<?php
	session_start(); //start session
	include('auth.php');
	$login = $_GET["login"];
	$passwd = $_GET["passwd"];

	if(auth($login, $passwd) == true)
	{
		$_SESSION["loggued_on_user"] = $login;
		echo "OK\n";
	}
	else
	{
		$_SESSION["loggued_on_user"] = "";
		echo "ERROR\n";
	}
?>