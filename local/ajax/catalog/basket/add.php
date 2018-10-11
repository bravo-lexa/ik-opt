<? /**
 * Форма обратной связи
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/ajax/.before.php';

if(!empty($_POST)) {
    $PRODUCT_ID = $_POST['id'];
    $PRODUCT_COUNT = $_POST['count'];

    if($PRODUCT_COUNT <= 0 ) $PRODUCT_COUNT = 1;

    if (CModule::IncludeModule("catalog"))
    {
        Add2Basket( $PRODUCT_ID, $PRODUCT_COUNT );
    }
}else{
    $error    = "Не переданны параметры";
}

/**
 * КОНЕЦ
 */
require_once  $_SERVER['DOCUMENT_ROOT'] . '/local/ajax/.after.php';