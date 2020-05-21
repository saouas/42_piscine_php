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

if ($argc != 4)
    echo "Incorrect Parameters\n";
else
    {
        switch(trim($argv[2], " \t"))
        {
            case '+':
            add(trim($argv[1], " \t"), trim($argv[3], " \t"));
            break;

            case '-':
            moins(trim($argv[1], " \t"), trim($argv[3], " \t"));
            break;

            case '*':
            fois(trim($argv[1], " \t"), trim($argv[3], " \t"));
            break;

            case '/':
            div(trim($argv[1], " \t"), trim($argv[3], " \t"));
            break;

            case '%':
            mod(trim($argv[1], " \t"), trim($argv[3], " \t"));
            break;

            default:
            break;
        }
        echo "\n";
    }

?>