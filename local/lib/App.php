<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 27.09.2018
 * Time: 11:18
 */

class APP {
    static private $Common = false ;
    static private $Form   = false;
    static private $Text   = false;
    static private $Bitrix = false;

    /**
     * Запускаем функции
     */
    static public function Common() {
        if(self::$Common == false) self::$Common = new Common;
        return self::$Common;
    }
    static public function Form() {
        if(self::$Form == false) self::$Form = new Form;
        return self::$Form;
    }
    static public function Text() {
        if(self::$Text == false) self::$Text = new Text;
        return self::$Text;
    }
    static public function Bitrix() {
        if(self::$Bitrix == false) self::$Bitrix = new Bitrix;
        return self::$Bitrix;
    }
}

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
class Form {
    public $form = array();

    /**
     * Создаем новую форму
     */
    public function new() {
        $this->form = array(
            ['fields' => array()],
            ['error'  => false]
        ) ;
        return $this;
    }
    /**
     * Проверка полей
     */
    public function checkField ($value = false , $name = 'default' , $necessarily = false)
    {
        $error = false; // Ошибки
        $this->addField($name, $value);

        switch ($name) {
            case 'name':
                if(empty($value))
                    $error = 'Вы не заполние поле';
                break;
            case 'email':
                if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $value))
                    $error = 'Email указан не правильно';
                if(empty($value))
                    $error = 'Вы не заполние поле';
                break;
        }

        if($necessarily == true AND empty($value))
            $error = 'Поле обязательно для заполнения';

        if($error !== false) {
            $this->form['error'][$name] = $error;
        }

        return $this;
    }
    public function isValidation() {
        if(!empty($this->form['error'])){
            return false;
        }
        return true;
    }
    public function getError(){
        return $this->form['error'];
    }
    public function getField($name = false) {
        if(!empty($name)){
            return $this->form['fields'][$name];
        }else{
            return $this->form['fields'];
        }
    }
    public function addField($name , $value ){
        $this->form['fields'][$name] = APP::Text()->clear($value);
        return $this;
    }
}
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
}
class Bitrix {

    public function addInfoBlock($id_infoBlock = false, $array = array()) {
        if(!empty($id_infoBlock)) {

            \Bitrix\Main\Loader::IncludeModule('iblock');

            $INFOBLOCK = new \CIBlockElement();

            if(!$INFOBLOCK->Add(array_merge(array('IBLOCK_ID' => $id_infoBlock), $array)))
            {
                return 'Произошла ошибка при добавлени записи: ' . $INFOBLOCK->LAST_ERROR;
            }
            return true;
        }
        return false;
    }

    public function includeFile($file = false){
        if(is_file($_SERVER["DOCUMENT_ROOT"] . '/local/include/' . $file)){
            return $value = file_get_contents( '' . $_SERVER["DOCUMENT_ROOT"] . '/local/include/' . $file . '' );
        }else{
            return 'Нет файла';
        }
    }
}