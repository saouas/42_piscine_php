#!/usr/bin/php
<?php
if ($argc == 2)
{
	if (strcmp($argv[1], "mais pourquoi cette demo ?") == 0)
	{
		echo "Tout simplement pour qu'en feuilletant le sujet\n";
		echo "on ne s'apercoive pas de la nature de l'exo..\n";
	}
}
else
{
	exit();
}

?>