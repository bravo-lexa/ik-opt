<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 03.10.2018
 * Time: 9:32
 */
namespace APP;

class Router {
    // * Сегментирование
    // * Получить массив сегдемтов
    public function get_segment($number = null)
    {
        static $array;
        if(!empty($array)) return $array;



        $arResult = array();
        $url = explode('/', $_SERVER['REQUEST_URI']);

        // * Разбиваем сигмент
        $i = 1;
        foreach ($url as $key => $item) {
            if(!empty($item)) {
                $arResult[$i] = $item;
                $i++;
            }
        }
        // * Если нужно передать только один параметр
        if(!empty($number)){
            if(isset($arResult[$number])){
                return $arResult[$number];
            }else{
                return false;
            }
        }else{
            return $arResult;
        }
    }

    // * Получить количество сегдметов в массиве
    public function get_segment_count()
    {
        return count(self::get_segment_array());
    }

    // * URL
    // * Получить текущий адресс страницы
    public function get_url()
    {
        $url = 'http';
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {$url .= "s";}
        $url .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $url;
    }
    // * Получить хост
    public function get_url_host() {
        $url = 'http';
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {$url .= "s";}
        $url .= "://".$_SERVER['HTTP_HOST'];
        return $url;
    }
    // * Получить хост
    public function get_url_folder() {
        $url = false;

        foreach (self::get_segment_array() as $item){
            $url .= '/'.$item;
        }
        if(!ROUTER::get_element_code()) $url .= '/';

        return $url;
    }

    // Манипуляция
    // * Перенаправление на 404
    public function error() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Location:'.$host.'404/');
        include ($_SERVER['DOCUMENT_ROOT'].'/local/pages/404.php');
        exit;
    }
    // * Редирект на страницу
    public function redirect($url) {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header("HTTP/1.1 301 Moved Permanently");
        header('Location:'.$host.$url);
        exit;
    }
    // * Обновить страницу
    public function update(){
        header('Location:'.self::get_url());
        exit();
    }
}