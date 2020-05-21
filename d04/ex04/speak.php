<?php
	session_start();
	date_default_timezone_set("Europe/Paris");
	if($_SESSION["loggued_on_user"] != "")
	{
		if (isset($_POST["submit"]))
		{
			if($_POST["submit"] == "OK")
			{
				if(file_exists("../private/chat") == false)
				{
					$array = array(array("login" => $_SESSION["loggued_on_user"] , "time" => time() , "msg" => $_POST["msg"]));
					$seri = serialize($array);
					file_put_contents("../private/chat", $seri);
				}
				else
				{
					$fd = fopen("../private/chat", "c+");
					flock($fd, LOCK_SH | LOCK_EX);
					$file = file_get_contents("../private/chat");
					$array2 = unserialize($file);
					$array2[] = array("login" => $_SESSION["loggued_on_user"] , "time" => time() , "msg" => $_POST["msg"]);
					$seri = serialize($array2);
					file_put_contents("../private/chat", $seri);
					flock($fd, LOCK_UN);
					fclose($fd);
				}
			}
		}
?>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
<html>
	<body>
		<form id="speak" method="POST" action="#"> 
		Message :<textarea name="msg" width="2000px"> </textarea>
		<input type="submit" name="submit" value="OK">
		</form>
	</body> 
</html>

<?php
}
else
	{
		echo "ERROR SORTIE\n";
	}?>