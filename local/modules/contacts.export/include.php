<?php

global $APPLICATION;

$vendorPath = $_SERVER['DOCUMENT_ROOT'].'/local/modules/dc.core/vendor/';
if (file_exists($vendorPath.'autoload.php')) {
    require_once $vendorPath . 'autoload.php';
}