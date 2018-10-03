<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 03.10.2018
 * Time: 9:32
 */

namespace APP;

class Common
{
    public function drop ( $array = false )
    {
        echo '<pre>';
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
}