#!/usr/bin/php
<?php

    function ft_split($string)
    {
        $retour = array();
        $retour = explode(" ",$string);
        return ($retour);
    }
    function editstring($array)
    {
        $len = count($array);
        $i = 1;
        $string = NULL;
        
        if ($len > 1)
        {
            while ($i != $len)
            {
                $array[$i] .= " ";
                $i++;
            }
        }

        $i = 1;
        while ($i != $len)
        {
            $string .= $array[$i];
            $i++;
        }
        $string .= $array[0];
        return($string);
    }
    if($argc > 1)
    {
        echo editstring(ft_split($argv[1]));
        echo "\n";
    }
    else
        exit();

?>
