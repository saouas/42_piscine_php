#!/usr/bin/php
<?php 

    function ft_split($string)
    {
        $retour = array();
        $retour = (explode(" ",$string));
        return ($retour);
    }

    function assemble($array)
    {
        $i = 0;
		$nb_of_spaces = count($array);
        $new_string = NULL;
        while($i != $nb_of_spaces)
        {
            if($array[$i] != "")
            {
				$new_string = $new_string . $array[$i];
				$new_string = $new_string . " ";
                $i++;
                continue;
			}
            $i++;
        }
        return ($new_string);
    }

    if($argc != 2)
        exit();
    $string = $argv[1];
    $array = array();
	$array = ft_split($string);
    $retour = assemble($array);
    $retour = trim($retour);
    echo $retour;
?>
