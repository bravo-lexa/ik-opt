<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 03.10.2018
 * Time: 9:32
 */

namespace APP;

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
        $this->form['fields'][$name] = \APP::Text()->clear($value);
        return $this;
    }
}