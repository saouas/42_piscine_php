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
function ft_merge($argvv , $argcc)
{
    $x = 1;
    $tab = array();
    $tmp = NULL;
    $tab_tmp = array();

    while ($x != $argcc)
    {
        $tmp = $argvv[$x];
        $tab_tmp = ft_sort($tmp);
        $tab = array_merge($tab, $tab_tmp);
        $x++;
    }
    return ($tab);
}
function ft_print($array, $type)
{
    $x = 0;
    $i = 0;
    $x = count($array);
    if($type == 2)
        sort($array, SORT_STRING);
    if($type == 1)
        sort($array, SORT_NATURAL | SORT_FLAG_CASE);
    if($type == 0)
        sort($array);
    
    while($i != $x)
    {
        echo $array[$i];
        echo "\n";
        $i++;                        
    }
}
function ft_decoupe_tab($tab)
{
    $len = count($tab);
    $i = 0;
    global $tab_lettre;
    $tab_lettre = array();
    global $tab_nombre;
    $tab_nombre = array();
    global $tab_autres;
    $tab_autres = array();

    while($i != $len)
    {
        if(is_numeric($tab[$i]))
            array_push($tab_nombre, $tab[$i]);
        else if(ctype_alpha($tab[$i]))
            array_push($tab_lettre, $tab[$i]);
        else
            array_push($tab_autres, $tab[$i]);
        $i++;
    }
}

$tab = array();
$tab = ft_merge($argv, $argc);
ft_decoupe_tab($tab, $argv);

ft_print($tab_lettre, 1);
ft_print($tab_nombre, 2);
ft_print($tab_autres, 0);

?>