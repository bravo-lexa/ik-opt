<?php
/**
 * Class Bitrix
 * @package APP\Bitrix
 */
namespace APP;

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
    public function add_basket($PRODUCT_ID , $PRODUCT_COUNT = 1){
        if (\CModule::IncludeModule("iblock")) {
            echo '111';
            return \APP::Add2Basket($PRODUCT_ID, $PRODUCT_COUNT);
        }else{
            echo '22222';
            return false;
        }
    }
    public function includeFile($file = false){
        if(is_file($_SERVER["DOCUMENT_ROOT"] . '/local/include/' . $file)){
            return $value = file_get_contents( '' . $_SERVER["DOCUMENT_ROOT"] . '/local/include/' . $file . '' );
        }else{
            return 'Нет файла';
        }
    }
}