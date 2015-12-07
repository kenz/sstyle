<?php
/**
 * メールフォーム
 */
$this->BcBaser->css('admin/jquery-ui/ui.all',array( 'property'=>'stylesheet'));
$this->BcBaser->js(array('admin/jquery-ui-1.8.19.custom.min', 'admin/i18n/ui.datepicker-ja'), false);
?>
<section class="contact card">
<h1><?php $this->BcBaser->contentsTitle() ?></h1>
<?php $this->Mail->description() ?>
<?php $this->BcBaser->element('mail_form') ?>
</section>
