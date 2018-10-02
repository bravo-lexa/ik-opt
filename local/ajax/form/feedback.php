<? /**
 * Форма обратной связи
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/ajax/.before.php';

if(empty($_POST['bot'])) {
    APP::Form()->new()
        ->checkField($_POST['name'], 'name' , true)
        ->checkField($_POST['phone'], 'phone', true);

    if(APP::Form()->isValidation()){

        $operation = APP::Bitrix()->addInfoBlock('4', [
            'NAME' => APP::Form()->getField('name'),
            'PROPERTY_VALUES' => [
                'phone' => APP::Form()->getField('phone'),
            ]
        ]);

        $arResult['text'] = 'Спасибо сообщение успешно отправлено';

        if(!$operation) {
            $error = 'Ошибка в заполнении формы';
        }

    }else{
        $arResult = APP::Form()->getError();
        $error    = true;
    }
}else{
    $error    = "Программное обеспечение сайта определяет Вас как робота";
}


/**
 * КОНЕЦ
 */
require_once  $_SERVER['DOCUMENT_ROOT'] . '/local/ajax/.after.php';

//use \WM\Common\Helper;
//
//$form = new \WM\Forms\AjaxForm();
//$form
//    ->setRules(array(
//        array('name', 'required', array('message' => 'Имя обязательно к заполнению')),
//        array('phone', 'phone', array('message' => 'Телефон должен быть в формате +7 (999) 666-33-11')),
//    ))
//    ->setFields($_POST);
//if($form->validate())
//{
//    $status = true;
//    //отправка сообщения с событием FEEDBACK_FORM
//    $status = $status && $form->sendMessage('CALL_BACK', array(
//            'AUTHOR' => $form->getField('name'),
//            'PHONE' => $form->getField('phone'),
//        ));
//    //добавление записи в инфоблок с ID = 2
//    $status = $status && $form->addRecord(10, array(
//            'NAME' => Helper::enc($form->getField('name')),
//            'PROPERTY_VALUES' => array(
//                'phone' => $form->getField('phone'),
//            ),
//            'ACTIVE' => 'Y',
//        ));
//
//    echo json_encode($status ? array('success' => true) : $form->getErrors());
//}
//else
//    echo json_encode( array('errors' =>  $form->getErrors()));