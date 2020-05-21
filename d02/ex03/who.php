#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/paris');
	function fun()
	{

		$user = get_current_user();
		$file = file_get_contents("/var/run/utmpx");
		$binary = substr($file, 1256);
		$final = array();
		$def = 'a256user/a4id/a32line/ipid/itype/I2timeval/a256host/i16pad';

		while ($binary != NULL)
		{
			$array = unpack($def, $binary);
			if(strcmp(trim($array[user]), $user) == 0 && $array[type] == 7)
			{
				$date = date("M j H:i", $array["timeval1"]);
				$line = trim($array[line]);
				$line = $line . "  ";
				$usr = trim($array[user]);
				$usr = $usr . "   ";
				$tmp = array($usr.$line.$date);
				$final = array_merge($tmp, $final);

			}
			$binary = substr($binary, 628);
		}
		sort($final);
		return ($final);
	}

	$final = fun();	
	foreach($final as $element)
	{
		echo $element;
		echo "\n";
	}

?>