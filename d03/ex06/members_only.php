<?php
function ft_array_key_exists($key, $array)
{
	foreach($array as $k=> $v)
	{
		if ($k === $key)
			return true;
	}
	return (false);
}
$Loginsucess = false;
if (ft_array_key_exists('PHP_AUTH_USER', $_SERVER) == true && ft_array_key_exists('PHP_AUTH_PW', $_SERVER) == true)
{
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	if ($user == 'zaz' && $pass == 'jaimelespetitsponeys')
		$Loginsucess = true;
}
if ($Loginsucess)
{
?>
<html><body>
Bonjour Zaz<br />
<?php
	echo "<img src='data:image/png;base64,";
	$file = base64_encode(file_get_contents("../img/42.png"));
	echo $file;
	echo "'";
?>
>
<body><html>
<?php 
}
else
{
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header('HTTP/1.0 401 Unauthorized');
 ?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php 
}
?>
