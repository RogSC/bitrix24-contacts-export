<?php

namespace ContactsExport\Service;

use ContactsExport\Interface\ExporterInterface;
use ContactsExport\Repository\ContactRepository;

class ExportContactsService {
	private ContactRepository $repository;
	private ExporterInterface $exporter;

	public function __construct(ContactRepository $repository, ExporterInterface $exporter) {
		$this->repository = $repository;
		$this->exporter = $exporter;
	}

	public function export(): string {
		$contacts = $this->repository->getContacts();

		return $this->exporter->export($contacts);
	}
}