<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\ModuleManager;

class contacts_export extends CModule
{
    /**
     * @var \Bitrix\Main\EventManager
     */
    protected $eventManager;

    public function __construct()
    {
        $arModuleVersion = [];

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        $this->PATH = $path;
        include($path."/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_ID = 'contacts.export';
        $this->MODULE_NAME = 'Модуль экспорта контактов в excel/csv';
        $this->PARTNER_NAME = '';
        $this->PARTNER_URI = '';
        $this->eventManager = EventManager::getInstance();
    }

    public function DoInstall(): bool
    {
        ModuleManager::registerModule($this->MODULE_ID);

        return true;
    }

    public function DoUninstall(): bool
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}
