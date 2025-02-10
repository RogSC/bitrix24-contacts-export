<?php

namespace My\ContactsExport\Factory;

use My\ContactsExport\Interface\ExporterInterface;
use My\ContactsExport\Service\CSVExporter;
use My\ContactsExport\Service\ExcelExporter;

class ExporterFactory {
	public static function createExporter(string $format): ExporterInterface {
		switch (strtolower($format)) {
			case 'csv':
				return new CSVExporter();
			case 'excel':
				return new ExcelExporter();
			default:
				throw new \Exception("Unsupported format: $format");
		}
	}
}