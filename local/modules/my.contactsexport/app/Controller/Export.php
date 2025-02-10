<?php

namespace My\ContactsExport\Controller;

use \Bitrix\Main\Error;

class Export extends \Bitrix\Main\Engine\Controller
{
	public function sendAction(string $format):? string
	{
		try {
			$exporter = \My\ContactsExport\Factory\ExporterFactory::createExporter($format);
			$repository = new \My\ContactsExport\Repository\ContactRepository();
			$module = new \My\ContactsExport\Service\ExportContactsService($repository, $exporter);

			return $module->generate();
		} catch (\Exception $e) {
			$this->addError(new Error('Error: ' . $e->getMessage()));
			return null;
		}
	}
}