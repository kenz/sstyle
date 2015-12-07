<?php

/* SVN FILE: $Id$ */
/**
 * [PUBLISH] メールフォーム本体
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.plugins.mail.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
$group_field = null;
$iteration = 0;
if (!isset($blockEnd)) {
	$blockEnd = 0;
}

if (!empty($mailFields)) {

	foreach ($mailFields as $key => $record) {

		$field = $record['MailField'];
		$iteration++;
		if ($field['use_field'] && ($blockStart && $iteration >= $blockStart) && (!$blockEnd || $iteration <= $blockEnd)) {

			$next_key = $key + 1;
			$description = $field['description'];

			/* 項目名 */
			if ($group_field != $field['group_field'] || (!$group_field && !$field['group_field'])) {
				echo '<h2 id="RowMessage' . Inflector::camelize($record['MailField']['field_name']) . '"';
				if ($field['type'] == 'hidden') {
					echo ' style="display:none"';
				}
				echo '>';
				if($freezed){
					//確認画面で存在していない項目に対してlabel forが付いているバグを回避させる
					echo $field['name'];
				}else{
					echo $this->Mailform->label("Message." . $field['field_name'] . "", $field['head']);
				}
				if ($field['not_empty']) {
					echo '<span class="required">*</span>';
				}
				echo "</h2>\n";
			}

			if (!$freezed && $description) {
				echo $description;
			}
			/* 入力欄 */
			if (!$freezed || $this->Mailform->value("Message." . $field['field_name']) !== '') {
				echo $field['before_attachment'];
			}
			if (!$field['no_send'] || !$freezed) {
				if($freezed){
					// 確認画面でsizeとmaxLengthが指定されているバグを直す
					$record['MailField']['size']=null;
					$record['MailField']['maxlength']=null;

				}
				$row = $this->Mailform->control($field['type'], "Message." . $field['field_name'] . "", $this->Mailfield->getOptions($record), $this->Mailfield->getAttributes($record));
				if($freezed){
					// 確認画面なのに必須チェックが入っているバグを強引に消す
					echo str_replace('required="required"' ,"", $row);
				}else{
					echo $row;
				}
			}
			if ($field['no_send'] && $freezed) {
				if($freezed){
					// メールアドレスでsizeとmaxLengthが指定されているバグを回避する
					$record['MailField']['size']=null;
					$record['MailField']['maxlength']=null;
				}

				echo $this->Mailform->control('hidden', "Message." . $field['field_name'] . "", $this->Mailfield->getOptions($record), $this->Mailfield->getAttributes($record));
			}
			if (!$freezed || $this->Mailform->value("Message." . $field['field_name']) !== '') {
				echo $field['after_attachment'];
			}
			if (!$freezed) {
				echo $field['attention'];
			}
			if (!$field['group_valid']) {
				if ($this->Mailform->error("Message." . $field['field_name'] . "_format", "check")) {
					echo $this->Mailform->error("Message." . $field['field_name'] . "_format", "形式が不正です。");
				} else {
					echo $this->Mailform->error("Message." . $field['field_name'], "必須項目です。");
				}
			}

			/* 説明欄 */
			if (($this->BcArray->last($mailFields, $key)) ||
				($field['group_field'] != $mailFields[$next_key]['MailField']['group_field']) ||
				(!$field['group_field'] && !$mailFields[$next_key]['MailField']['group_field']) ||
				($field['group_field'] != $mailFields[$next_key]['MailField']['group_field'] && $this->BcArray->first($mailFields, $key))) {

				if ($field['group_valid']) {
					if ($this->Mailform->error("Message." . $field['group_field'] . "_format", "check")) {
						echo $this->Mailform->error("Message." . $field['group_field'] . "_format", "形式が不正です。");
					} else {
						if ($field['valid']) {
							echo $this->Mailform->error("Message." . $field['group_field'], "必須項目です。");
						}
					}
					echo $this->Mailform->error("Message." . $field['group_field'] . "_not_same", "入力データが一致していません。");
					echo $this->Mailform->error("Message." . $field['group_field'] . "_not_complate", "入力データが不完全です。");
				}

			}
			$group_field = $field['group_field'];
		}
	}
}
