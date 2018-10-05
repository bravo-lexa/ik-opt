<?php
$arUrlRewrite=array (
  5 => 
  array (
    'CONDITION' => '#^/products/(all|molochnyy-rodnik|medzhik-milk|pyatigorskoe|ekonom|drugoe)/?(?:\\?(.*))?$#',
    'RULE' => 'CODE=$1&$2',
    'ID' => '',
    'PATH' => '/products/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/products/([^/]+)/?(?:\\?(.*))?$#',
    'RULE' => 'CODE=$1&$2',
    'ID' => '',
    'PATH' => '/products/detail.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/news/([^/]+)/?(?:\\?(.*))?$#',
    'RULE' => 'CODE=$1&$2',
    'ID' => '',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.section',
    'PATH' => '/personal/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
