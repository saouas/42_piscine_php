<?php
	function auth($login, $passwd)
	{
		$file = file_get_contents("../private/passwd");
		$unseri_file = unserialize($file);
		$passwd_hash = hash('whirlpool', $passwd);

		foreach($unseri_file as $elem => &$key)
		{
			foreach($key as $e => &$k)
			{
				if ($k == $passwd_hash && $key["login"] == $login)
				{
					return (true);
				}
			}
		}
		return (false);
	}
?>