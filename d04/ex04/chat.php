<?php
date_default_timezone_set("Europe/Paris");
$file = file_get_contents("../private/chat");
$unseri = unserialize($file);
foreach ($unseri as $element)
{
	echo "[";
	echo date("H:i",$element["time"]);
	echo "] ";
	echo "<b>";
	echo $element['login'];
	echo "</b>: ";
	echo $element['msg'];
	echo "<br />";
}
?>