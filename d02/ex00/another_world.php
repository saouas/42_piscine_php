#!/usr/bin/php
<?php

    function ft_parse ($string)
    {
        $string = preg_replace('#[ \t]{2,}#', ' ',$string);
        return ($string);
    }

    if ($argc >= 2)
    {
        $string = trim($argv[1]);
        $string = ft_parse($string);
        echo "$string\n";
    }
    else
        exit();
?>
