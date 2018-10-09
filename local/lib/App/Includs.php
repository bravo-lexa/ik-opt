<?php

/**
 * Class Common
 * @package APP\Common
 */

namespace APP;

class Includs
{
    public function template ($template = '', $name = null, $file = '.default', $arParam = array())
    {
        $url = $_SERVER['DOCUMENT_ROOT'] . '/local/lib/Templates/' . $template . '/';

        if (!empty($name)) $url .= $name . '/';
        if (!empty($file)) $file = $file . '.php'; else $file .= '.default.php';


        // Boot файл
        if (file_exists($url . '.boot.php')) include( $url . '.boot.php');

        // Загружаем
        if (file_exists($url. $file)) {
            include('' . $url . $file . '');
        } else {
            echo 'Шаблон: Не найден';
            echo $url;
            echo '<br>';
        }
    }
}