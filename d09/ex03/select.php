<?php
	$file = fopen("list.csv", "r");
	$x = 0;
	$todo = array();
	if ($file)
	{
		while (($line = fgets($file)) != false)
		{
			preg_match('#(.*)(;)(.*)#', $line, $matches);
			$todo[$x] = $matches[0];
			$x++;
		}
		echo json_encode($todo);
	}
?>
