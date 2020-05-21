<?php
	if($_POST["submit"] == "OK")
	{

		if($_POST["oldpw"] != "" && $_POST["newpw"] != "")
		{

			$file = file_get_contents("../private/passwd");
			$unseri_file = unserialize($file);
			$exist = false;
			$need_to_update = false;
			$same_pass = false;
			foreach($unseri_file as $elem)
			{
				if ($elem["login"] == $_POST["login"])
					$exist = true;
			}
			if ($exist == true)
			{
				$check_pass = hash('whirlpool', $_POST["oldpw"]);
				$new_pass = hash('whirlpool', $_POST["newpw"]);
				foreach($unseri_file as $elem)
				{
					if ($elem["passwd"] == $check_pass && $elem["login"] == $_POST["login"])
					{
						$same_pass = true;
					}
				}
				if ($same_pass == true)
				{
					foreach($unseri_file as $elem => &$key)
					{
						foreach($key as $e => &$k)
						{
							if($k == $check_pass && $key["login"] == $_POST["login"])
							{
								$k = $new_pass;
								$need_to_update = true;
							}
						}
					}
					if ($need_to_update == true)
					{
						$seri = serialize($unseri_file);
						file_put_contents("../private/passwd", $seri);
						echo "OK\n";
					}
				}
				else
				{
					echo "ERROR\n";
				}
			}
			else
			{
				echo "ERROR\n";
			}
		}
		else
		{
			echo "ERROR\n";
		}
	}
	else
	{
		echo "ERROR\n";
	}
?>