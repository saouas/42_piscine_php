<?php
	session_start(); //start session
	include('auth.php');
	$login = $_POST["login"];
	$passwd = $_POST["passwd"];

	if(auth($login, $passwd) == true)
	{
		$_SESSION["loggued_on_user"] = $login;
	?>
		<iframe height="550px" width="100%" name = "chat" src="chat.php"></iframe>
		<iframe height="50px" width="100%" name = "speak" src="speak.php"></iframe>
	<?php
	}

	else
	{
		$_SESSION["loggued_on_user"] = "";
		echo "ERROR\n";
	}
?>