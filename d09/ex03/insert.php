<?php

	$id = $_GET["id"];
	$todo = $_GET["todo"];
	echo "$id;$todo";
	$file = "list.csv";
	$line = $id. ";" .$todo . PHP_EOL;
	file_put_contents($file, $line, FILE_APPEND);
	
?>