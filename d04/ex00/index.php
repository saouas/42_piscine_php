<?php
	session_start(); //start session for cookie
	function ft_array_key_exists($key, array $array)
	{
		foreach ($array as $k => $v) {
			if ($k === $key)
				return true;
		}
		return false;
	}
	if (ft_array_key_exists("submit", $_GET) == true)
	{
		if ($_GET["submit"] == "OK")
		{
			//timestamp of 1 year for example
			setcookie("login", $_GET["login"], 1585220866);
			setcookie("passwd", $_GET["passwd"], 1585220866);	
		}
	}
?>
<html>
	<body>
		<form name ="formulaire" action="index.php" method="get">
			Identifiant: <input type="text" name="login" value"">
			<br>
			Mot de passe: <input type="password" name="passwd" value "">
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>