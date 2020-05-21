#!/usr/bin/php
<?php 

    function ft_split($string)
    {
        $retour = array();
        $retour = (explode(" ",$string));
        return ($retour);
    }

    function ft_sort($string)
    {
        $retour = array();
        $retour = ft_split($string);
        return ($retour);
    }

    function ft_print($array)
    {
        $x = 0;
        $i = 0;
        $x = count($array);
        sort ($array);
        while($i != $x)
        {
            echo $array[$i];
            echo "\n";
            $i++;                        
        }
    }

    $x = 1;
    $tab = array();
    $tmp = NULL;
    $tab_tmp = array();
    if($argc == 1)
        exit();
    while ($x != $argc)
    {
        $tmp = $argv[$x];
        $tab_tmp = ft_sort($tmp);
        $tab = array_merge($tab, $tab_tmp);
        $x++;
    }
    ft_print($tab);
?>