#!/usr/bin/php
<?php

function isnumber($x)
{
    for($i = 0; $i < strlen($x) - 1; $i++)
        if (is_numeric($x[$i]) == false)
            return (false);
    return true;
}

function print_2($x)
{
    for($i = 0; $i < strlen($x) - 1; $i++)
        echo($x[$i]);
}

function isempty($x)
{
    if ($x[0] == "\n")
        return true;
    return false;
}

while (1)
{
    echo "Entrez un nombre: ";
    $stdin = fopen("php://stdin",'r');
    $listen = fgets($stdin);
	if (feof($stdin) == true)
	{
		echo"\n";
		exit();
	}
    $var = intval($listen);
    if (isnumber($listen) == true && isempty($listen) == false)
    {

        if (($var % 2) === 0)
        {
            echo "Le chiffre ";
            print_2($listen);
            echo " est Pair\n";
        }
        else if (($var % 2) == 1)
        {
            echo "Le chiffre ";
            print_2($listen);
            echo " est Impair\n";
        }
    }
    else
    {
        echo"'";
        print_2($listen);
        echo "' n'est pas un chiffre\n";
    }
}

?>
