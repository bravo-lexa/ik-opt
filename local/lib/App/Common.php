<?php

/**
 * Class Common
 * @package APP\Common
 */

namespace APP;

class Common
{
    public function drop ( $array = false )
    {
        $style = "
            font-family: monospace, monospace;
            font-size: 14px;
            background: #ffc10730;
            color: #000;
            border: 2px solid #ffc10745;
        ";
        echo '<pre style="'.$style.'">';
        print_r($array);
        echo '</pre>';
        return true;
    }

    public function get_phone_link($value = false) {

        $value =  preg_replace('/[^0-9]/', '', $value);
        // Если номер начинается с 7, то добавить +7
        if(mb_substr($value,0,1,"UTF-8") === '7'){
            $value = '+'.$value;
        }

        $value = 'tel:'. $value;
        return $value;
    }

    public function var_name( $v )
    {
        $trace = debug_backtrace();
        $vLine = file( __FILE__ );
        $fLine = $vLine[ $trace[0]['line'] - 1 ];
        preg_match( "#\\$(\w+)#", $fLine, $match );
        return $match[0];
    }
    public function var_in_array($var1 = false, $var2 = false, $var3 = false, $var4 = false, $var5 = false, $var6 = false, $var7 = false, $var8 = false, $var9 = false, $var10 = false )
    {
        $array = array();

        if (isset($var1)) $array[\APP::Common()->var_name($var1)]    = $var1;
        if (isset($var2)) $array[\APP::Common()->var_name($var2)]    = $var2;
        if (!empty($var3)) $array[\APP::Common()->var_name($var3)]    = $var3;
        if (!empty($var4)) $array[\APP::Common()->var_name($var4)]    = $var4;
        if (!empty($var5)) $array[\APP::Common()->var_name($var5)]    = $var5;
        if (!empty($var6)) $array[\APP::Common()->var_name($var6)]    = $var6;
        if (!empty($var7)) $array[\APP::Common()->var_name($var7)]    = $var7;
        if (!empty($var8)) $array[\APP::Common()->var_name($var8)]    = $var8;
        if (!empty($var9)) $array[\APP::Common()->var_name($var9)]    = $var9;
        if (!empty($var10)) $array[\APP::Common()->var_name($var10)]  = $var10;

        \APP::Common()->drop($array);
        return $array;
    }
}