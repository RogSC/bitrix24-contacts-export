<?php

namespace ContactsExport\Service;

use ContactsExport\Interface\ExporterInterface;

class CSVExporter implements ExporterInterface {
	public function export(array $data): string {
		$output = fopen('php://temp', 'r+');

		if (!empty($data)) {
			fputcsv($output, array_keys($data[0]));
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