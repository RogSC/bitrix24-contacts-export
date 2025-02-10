<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {die();}
?>

<div class="exporter">
	<div class="exporter-format">
		<div class="exporter-format__title">
			Choose format
		</div>
		<div class="exporter-format__select">
            <div class="ui-ctl ui-ctl-after-icon ui-ctl-dropdown">
                <div class="ui-ctl-after ui-ctl-icon-angle"></div>
                <select class="ui-ctl-element" name="format">
					<?foreach ($arResult['FORMATS'] as $id => $name) {?>
                        <option value="<?=$id?>"><?=$name?></option>
                    <?}?>
                </select>
            </div>
		</div>
	</div>
    <div class="exporter-button">
        <span class="ui-btn ui-btn-primary exporter-button-send">Send</span>
    </div>
</div>

