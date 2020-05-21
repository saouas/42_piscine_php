#!/usr/bin/php
<?php

function add($x, $y)
{
    echo ($x + $y);
}
function moins($x, $y)
{
    echo ($x - $y);
}
function fois($x, $y)
{
    echo ($x * $y);
}
function div($x, $y)
{
    echo ($x / $y);
}
function mod($x, $y)
{
    echo ($x % $y);
}
function check_param($argc)
{
    if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
        exit();
    }
}
function error_msg()
{
    echo "Syntax Error\n";
    exit();
}
function is_thisoperator($string)
{
    return ('+' || '-' || '*' || '/' || '%');
}
$nbr1 = NULL;
$nbr2 = NULL;
$sign = NULL;
function decoupe ($argv)
{
    global $nbr1;
    global $nbr2;
    global $sign;
    $string = NULL;
    $string = trim($argv[1], " \t");
    $x = 0;
   
        if (is_numeric($string[0]) == false)
            error_msg();
        if (is_numeric($string[$x]))
        {
            while (is_numeric($string[$x]))
            {
                $nbr1 .= $string[$x];
                $x++;
            }
        }
        while($x < strlen($string) && $string[$x] == " ")
            $x++;
        if (is_thisoperator(substr($string, $x)))
        {
            $sign .= $string[$x];
            $x++;
        }
        else
        {
            error_msg();
        }
        while($x < strlen($string) && $string[$x] == " ")
        $x++;
        if ($x + 1 <= strlen($string)&& is_numeric($string[$x]))
        {
            while ($x < strlen($string))
            {
                if (is_numeric($string[$x]))
                {
                    $nbr2 .= $string[$x];
                    $x++;
                }
            }
        }
        else
        {
            error_msg();
        }
}
    check_param($argc);
    decoupe($argv);
    switch(trim($sign, " \t"))
    {
        case '+':
        add(trim($nbr1, " \t"), trim($nbr2, " \t"));
        break;

        case '-':
        moins(trim($nbr1, " \t"), trim($nbr2, " \t"));
        break;

        case '*':
        fois(trim($nbr1, " \t"), trim($nbr2, " \t"));
        break;

        case '/':
        div(trim($nbr1, " \t"), trim($nbr2, " \t"));
        break;

        case '%':
        mod(trim($nbr1, " \t"), trim($nbr2, " \t"));
        break;

        default:
        break;
    }
    echo "\n";

?>