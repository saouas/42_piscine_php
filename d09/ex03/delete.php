<?php

	$file = fopen("list.csv", "r+");
	$files = file("list.csv");
	$x = 0;
	$id = $_GET["id"];
	if ($file)
	{
		while (($line = fgets($file)) != false)
		{
			preg_match('#(.*)(;)(.*)#', $line, $matches);
			if ($id == $matches[1])
			{
				echo "line  = $line files line = ";
				echo $files[$x];
				unset($files[$x]);
				file_put_contents("list.csv" , $files);
				exit();
			}
			$x++;
		}
		fclose($file);
	}

?>