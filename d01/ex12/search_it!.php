#!/usr/bin/php
<?php 

    function ft_compare($string, $reference)
    {
        $key = substr($string, 0, strpos($string, ':'));
        return(strcmp($reference, $key));
    }

    function print_val($string)
    {
        $new_string = substr($string, strpos($string, ':') + 1);
        echo "$new_string\n";
    }
    $x = $argc - 1;
    if ($argc < 3)
        exit();

    else
    {
        while ($x > 0)
        {
            if (ft_compare($argv[$x], $argv[1]) == 0)
            {
                print_val($argv[$x]);
                exit();
            }
            $x--;
        }
    }
?>