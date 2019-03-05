<?php

class HUtils {

    function trim($str, $len)
    {
        if (strlen($str) > $len)
            return substr($str, 0, $len) . "...";
        else
            return $str;
    }

}