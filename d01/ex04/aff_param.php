#!/usr/bin/php
<?php 
    if($argc == 1)
        exit();
    else
    {
        for($i = 1; $i < $argc ; $i++)
        {
            echo($argv[$i]);
            echo "\n";
        }
    }
?>