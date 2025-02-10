<?php

namespace My\ContactsExport\Service;

use My\ContactsExport\Interface\ExporterInterface;

class ExcelExporter implements ExporterInterface {
	public const FILE_EXTENSION = 'xlsx';

	public function export(array $data): string {
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		if (!empty($data)) {
			$col = 'A';
			foreach (array_keys(current($data)) as $header) {
				$sheet->setCellValue($col . '1', $header);
				$col++;
			}
		}

		$rowNum = 2;
		foreach ($data as $row) {
			$col = 'A';
			foreach ($row as $value) {
				$sheet->setCellValue($col . $rowNum, $value);
				$col++;
			}
			$rowNum++;
		}

		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		ob_start();
		$writer->save('php://output');
		$excelData = ob_get_clean();

		return $excelData;
	}
}