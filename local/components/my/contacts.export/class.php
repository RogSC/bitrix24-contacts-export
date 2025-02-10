<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {die();}

class ContactsExport extends \CBitrixComponent
{
	protected const FILTER_ID = 'contacts_export';

	public function executeComponent()
	{
		$this->init();
		$this->includeComponentTemplate();
	}

	protected function init()
	{
		$this->arResult['FORMATS'] = $this->formats();
	}

	protected function formats(): array
	{
		return [
			'excel' => 'Excel',
			'csv' => 'CSV'
		];
	}
}