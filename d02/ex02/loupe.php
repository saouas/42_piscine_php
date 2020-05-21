#!/usr/bin/php
<?php
	function treat($matches)
	{
		return($matches[1] . $matches [2] . $matches[3] . strtoupper($matches[4]) . $matches[5]);
	}

	function treat2($matches)
	{
		return($matches[1] . $matches[2] . strtoupper($matches[3]) . $matches[4]);
	}
	function up_1($string)
	{
		
		$string = preg_replace_callback('#(<a href=.*)(title=)("?)(.*)("?</a>)#' , treat, $string);
		return ($string);
	}
	function up_2($string)
	{
		$string = preg_replace_callback('#(<a href=.*)(>{1})(.*)(<{1})#U' , treat2, $string);	
		return ($string);
	}
	$page = file_get_contents($argv[1]);

	$page = up_1($page);
	echo up_2($page);
	echo "\n";

?>
