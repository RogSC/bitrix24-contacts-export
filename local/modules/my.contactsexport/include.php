<?php

global $APPLICATION;

$vendorPath = $_SERVER['DOCUMENT_ROOT'].'/local/modules/my.contactsexport/vendor/';
if (file_exists($vendorPath.'autoload.php')) {
    require_once $vendorPath . 'autoload.php';
}