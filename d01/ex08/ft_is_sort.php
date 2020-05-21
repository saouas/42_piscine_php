<?php
  
  function ft_is_sort($array)
    {
        $flag = true;
        $default = $array;
        sort($array);

        foreach($array as $key=>$value)
            if($value != $default[$key])
                $flag = false;
        return ($flag);
	}
?>