<?php

namespace My\ContactsExport\Service;

use My\ContactsExport\Interface\ExporterInterface;

class CSVExporter implements ExporterInterface {
	public const FILE_EXTENSION = 'csv';

	public function export(array $data): string {
		$output = fopen('php://temp', 'r+');

		if (!empty($data)) {
			fputcsv($output, array_keys(current($data)));
		}

		foreach ($data as $row) {
			fputcsv($output, $row);
		}

		rewind($output);
		$csv = stream_get_contents($output);
		fclose($output);

		return $csv;
	}
}