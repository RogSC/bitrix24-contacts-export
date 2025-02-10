<?php

namespace My\ContactsExport\Service;

use My\ContactsExport\Interface\ExporterInterface;
use My\ContactsExport\Repository\ContactRepository;

class ExportContactsService {
	private ContactRepository $repository;
	private ExporterInterface $exporter;

	public function __construct(ContactRepository $repository, ExporterInterface $exporter) {
		$this->repository = $repository;
		$this->exporter = $exporter;
	}

	public function generate()
	{
		$contacts = $this->repository->getContacts();
		$fileContent = $this->exporter->export($contacts);

		return $this->saveToFile($fileContent);
	}

	public function saveToFile($fileContent)
	{
		$strFilename = sprintf('%s_contacts_export', date('Y-m-d-H-i'));
		$fileName = '/upload/export/'.$strFilename.'.'.$this->exporter::FILE_EXTENSION;
		file_put_contents($_SERVER['DOCUMENT_ROOT'].$fileName, $fileContent);

		$siteLink = \CSite::GetList()->Fetch()['SERVER_NAME'];

		return 'https://'.$siteLink.$fileName;
	}
}