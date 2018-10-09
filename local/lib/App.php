<?php
/**
 * Created by PhpStorm.
 * User: radiofunt
 * Date: 27.09.2018
 * Time: 11:18
 */

// * Версия дополнениия
const APP_VERSION = '0.0.2';

// * Создаем константу - путь до папки с классами
define('APPLIBS', $_SERVER['DOCUMENT_ROOT'].'/local/lib/App' . DIRECTORY_SEPARATOR);

// * Загружаем библиотеки
require_once(APPLIBS.'Common.php');
require_once(APPLIBS.'Form.php');
require_once(APPLIBS.'Text.php');
require_once(APPLIBS.'Router.php');
require_once(APPLIBS.'Bitrix.php');
require_once(APPLIBS.'User.php');
require_once(APPLIBS.'Includs.php');

class APP {
    static private $Common = false ;
    static private $Form   = false;
    static private $Text   = false;
    static private $Router = false;
    static private $Bitrix = false;
    static private $User   = false;
    static private $Includs   = false;

    /**
     * Запускаем функции
    */
    static public function Common() {
        if(self::$Common == false) self::$Common = new APP\Common;
        return self::$Common;
    }
    static public function Form() {
        if(self::$Form === false) self::$Form = new APP\Form;
        return self::$Form;
    }
    static public function Text() {
        if(self::$Text == false) self::$Text = new APP\Text;
        return self::$Text;
    }
    static public function Router() {
        if(self::$Router == false) self::$Router = new APP\Router;
        return self::$Router;
    }
    static public function Bitrix() {
        if(self::$Bitrix == false) self::$Bitrix = new APP\Bitrix;
        return self::$Bitrix;
    }
    static public function User() {
        if(self::$User == false) self::$User = new APP\User;
        return self::$User;
    }
    static public function Includs() {
        if(self::$Includs == false) self::$Includs = new APP\Includs;
        return self::$Includs;
    }
}