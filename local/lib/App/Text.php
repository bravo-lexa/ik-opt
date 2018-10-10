<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 03.10.2018
 * Time: 9:32
 */

namespace APP;

class Text {
    /**
     * Очистка текста
     */
    public function clear ($value = false)
    {
        $value = trim($value);          // Удаляет пробелы из начала и конца строки
        $value = stripslashes($value);  // Удаляет экранирование символов, произведенное функцией
        $value = strip_tags($value);    // Удалем HTML и PHP тэги
        return $value;
    }

    public function point($value , $max_number){
        if (strlen($value) > $max_number) {
            $value = substr($value, 0, $max_number - 3).'...';
        }
        return $value;
    }
}