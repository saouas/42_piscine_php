#!/usr/bin/php
<?php
	header("Content-type: image/png");
	function get_link($string)
	{
		preg_match_all('#(<img src=")(.*)(")#U', $string, $new_str);
		return($new_str[2]);
	}

	function get_htmlpage($website)
	{
		$page = file_get_contents($website);
		return ($page);
	}
	function name_file($argv)
	{
		preg_match('#(http[s]?://)(www.*)(\.[svg|png|jpg|jpeg|gif|bmp|ico|tiff])(.*)#', $argv[1], $new_str);
		return ($new_str[2] . $new_str[3] . $new_str[4] . "/");

	}
	function cut_name_file($string)
	{
		preg_match('#[^/]+$#', $string, $new_str);
		return ($new_str[0]);
	}
	function edit_link($links, $argv)
	{
		$len = count($links);
		$i = 0;
		while ($i < $len)
		{
			if (preg_match('#https?://#', $links[$i]))
			{
				$i++;
				continue;
			}
			else
			{
				if($links[$i][0] == '/')
					$links[$i] = substr($links[$i], 1);
				$links[$i] = 'https://' . name_file($argv) . $links[$i];
				$i++;
			}
		}
		return ($links);
	}
	function download($link, $argv)
	{
		$save_to = name_file($argv);
		@mkdir($save_to, 0777, true); 
		if(!$fd = fopen($save_to . cut_name_file($link), 'w+'))
		{
			echo "error 1";
			exit();
		}
		$ch = curl_init($link);
		curl_setopt($ch	, CURLOPT_FILE, $fd);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_exec($ch);
		curl_close($ch);
		fclose($fd);

	}
	function wrapper_download($links, $argv)
	{
		$len = count($links);
		$i = 0;
		while ($i < $len)
		{
			download($links[$i], $argv);
			$i++;
		}
	}

	$tab_links = array();
	$tab_links = get_link(get_htmlpage($argv[1]));
	$tab_links = edit_link($tab_links, $argv);
	wrapper_download($tab_links, $argv);
?>
