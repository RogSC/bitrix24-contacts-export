<?php

/**
 * @global  \CMain $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$APPLICATION->SetTitle('Экспорт контактов');
$APPLICATION->includeComponent(
	'my:contacts.export',
	'',
	[]
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
