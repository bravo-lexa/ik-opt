<?php

// * Делаем ответ для клиента
if(($error === false OR empty($error)) AND !empty($_POST))
{
    // * Если нет ошибок сообщаем об успехе
    echo json_encode(array('result' => 'success', 'data' => $arResult, '$_POST' => $_POST,));
}
else
{
    if($error === true) $error = null;
    // * Если есть ошибки то отправляем
    echo json_encode(array('result' => 'error', 'data' => $arResult, 'error' => $error, '$_POST' => $_POST));
}