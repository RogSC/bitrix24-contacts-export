<?php

namespace My\ContactsExport\Repository;

use Bitrix\Crm\ContactTable;
use Bitrix\Crm\FieldMultiTable;
use Bitrix\Main\Loader;

Loader::includeModule('crm');

class ContactRepository {
	public function getContacts(): array {
		$result = [];
		$contactsResult = ContactTable::getList([
			'select' => ['ID', 'NAME', 'LAST_NAME', 'POST'],
		]);
		$contacts = $contactsResult->fetchCollection();

		foreach ($contacts as $contact) {
			$result[$contact->getId()] = [
				'ID' => $contact->getId(),
				'Name' => $contact->getName(),
				'Last Name' => $contact->getLastName(),
				'Post' => $contact->getPost(),
				'Email' => '',
				'Phone' => '',
			];
		}

		$fieldsMultiResult = FieldMultiTable::getList([
			'filter' => ['ENTITY_ID' => 'CONTACT', 'TYPE_ID' => ['EMAIL', 'PHONE']],
		]);
		while ($fieldsMulti = $fieldsMultiResult->fetch()) {
			$fieldName = $fieldsMulti['TYPE_ID'] === 'EMAIL' ? 'Email' : 'Phone';
			$result[$fieldsMulti['ELEMENT_ID']][$fieldName] = $fieldsMulti['VALUE'];
		}

		return $result;
	}
}