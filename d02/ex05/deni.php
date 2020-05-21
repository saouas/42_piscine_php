#!/usr/bin/php
<?php
	function check_args($argv, $argc)
	{
		if ($argc != 3)
			exit();
		if (!file_exists($argv[1]))
			exit();
	}
/* Check args */	
	check_args($argv, $argc);
/* Extract first line */
	$content = file($argv[1]);
	$def = $content[0];
/* Create Arrays */
	preg_match('#(.*);(.*);(.*);(.*);(.*)#', $def, $names);
	$len = count($names);
	$i = 1;
	while($i < $len)
	{
		${$names[$i]} = array();
		$i++;
	}
/* Fill array */
	$i = 1;
	$len = count($content);
	$def = $file[0];
	while ($i < $len)
	{
		$len2 = count($names);
		$x = 1;
		while($x < $len2)
		{
			preg_match('#([a-zA-z]*);([a-zA-Z]*);([\w-]*@[\w-]*.[a-z].*);(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3});([a-zA-Z]*)#', $content[$i], $matches[$i]);
			$x++;
		}
		$i++;
	}
/* Check index */
	$index = array_search($argv[2], $names);
	if($index == 0)
		exit();
/* Unset value */
	$i = 1;
	while ($i <= count($matches))
	{
		unset($matches[$i][0]);
		$i++;
	}
	unset($names[0]);
	unset($content[0]);
/* Asociate key and value */
	foreach($names as $names_k => $names_v)
	{
		$tmp = array();
		foreach($matches as $value)
		{
			if (isset($value[$index]))
				$tmp[$value[$index]] = $value[$names_k];
		}
		$$names_v = $tmp;
	}
/* Exec command */
	$stdin = fopen('php://stdin', 'r');
	while ($stdin && !feof($stdin))
	{
		echo "Entrez votre commande: ";
		$scanf = fgets($stdin);
		if ($scanf)
			eval($scanf);
	}
	fclose($stdin);
	echo "\n";
	exit();

?>
