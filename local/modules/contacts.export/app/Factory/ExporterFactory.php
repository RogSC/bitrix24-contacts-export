<?php

namespace ContactsExport\Repository;

use ContactsExport\Interface\ExporterInterface;
use ContactsExport\Service\CSVExporter;
use ContactsExport\Service\ExcelExporter;

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