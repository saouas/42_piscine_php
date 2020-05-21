#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
    function error_msg ()
    {
        echo "Wrong Format\n";
        exit();
    }
    function get_year($string)
    {
        if(preg_match('#[0-9]{4}#', $string, $year))
            return ($year[0]);
        else
            error_msg();
    }
    function get_day($string)
    {
        if(preg_match('#[0-9]{1,2}#', $string, $day))
            return ($day[0]);
        else
            error_msg();
    }
    function get_month($string)
    {
        if(preg_match('#[J-j]anvier|[F-f]évrier|[M-m]ars|[A-a]vril|[M-m]ai|[J-j]uin|[J-j]uillet|[A-a]oût|[S-s]eptembre|[O-o]ctobre|[N-n]ovembre|[D-d]écembre#', $string ,$month))
        {
            if(!strcmp($month[0], "Janvier") || !strcmp($month[0], "janvier"))
                return (1);
            else if (!strcmp($month[0], "Février") || !strcmp($month[0], "février"))
                return (2);
            else if (!strcmp($month[0], "Mars") || !strcmp($month[0], "mars"))
                return (3);
            else if (!strcmp($month[0], "Avril") || !strcmp($month[0], "avril"))
                return (4);
            else if (!strcmp($month[0], "Mai") || !strcmp($month[0], "mai"))
                return (5);
            else if (!strcmp($month[0], "Juin") || !strcmp($month[0], "juin"))
                return (6);
            else if (!strcmp($month[0], "Juillet") || !strcmp($month[0], "juillet"))
                return (7);
            else if (!strcmp($month[0], "Août") || !strcmp($month[0], "août"))
                return (8);
            else if (!strcmp($month[0], "Septembre") || !strcmp($month[0], "septembre"))
                return (9);
            else if (!strcmp($month[0], "Octobre") || !strcmp($month[0], "octobre"))
                return (10);
            else if (!strcmp($month[0], "Novembre") || !strcmp($month[0], "novembre"))
                return (11);
            else if (!strcmp($month[0], "Décembre") || !strcmp($month[0], "décembre"))
                return (12);
            else
                eror_msg();
        }

        else
        {
           error_msg(); 
        }
    }
    function get_second($string)
    {
        if(preg_match_all('#:[0-9]{2}#', $string, $second, PREG_SET_ORDER))
            return (substr(($second[1][0]), 1));
        else
            error_msg();
    }
    function get_minute($string)
    {

        if(preg_match_all('#:[0-9]{2}#', $string, $second, PREG_SET_ORDER))
            return (substr(($second[0][0]), 1));
        else
            error_msg();
    }
    function get_hour($string)
    {

        if(preg_match_all('#[0-9]{2}:#', $string, $second, PREG_SET_ORDER))
            return (substr(($second[0][0]), 0, 2));
        else
            error_msg();
	}
	if ($argc != 2)
		exit();
    $timestamp = mktime(get_hour($argv[1]), get_minute($argv[1]), get_second($argv[1]), get_month($argv[1]), get_day($argv[1]), get_year($argv[1]));
	echo "$timestamp\n";
?>
