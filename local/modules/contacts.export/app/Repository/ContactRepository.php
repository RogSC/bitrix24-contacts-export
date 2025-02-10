<?php

namespace ContactsExport\Repository;

class ContactRepository {
	public function getContacts(): array {
		// Здесь реализуется получение контактов через API Bitrix24
		return [
			['Name' => 'Иван Иванов', 'Email' => 'ivan@example.com'],
			['Name' => 'Мария Петрова', 'Email' => 'maria@example.com'],
			// Дополнительные данные...
		];
	}
}