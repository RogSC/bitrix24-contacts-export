<?php

namespace ContactsExport\Interface;

interface ExporterInterface {
	/**
	 * @param array $data
	 * @return string
	 */
	public function export(array $data): string;
}
