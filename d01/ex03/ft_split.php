<?php 
    function ft_split($string)
    {
        $retour = array();
        $retour = explode(" ",$string);
        sort($retour);
        return ($retour);
	}
?>