<?php
/**
 * [ADMIN] パスワードリセット画面
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2014, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2014, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
$userModel = Configure::read('BcAuthPrefix.' . $currentPrefix . '.userModel');
if (!$userModel) {
	$userModel = 'User';
}
?>


<div class="section">
	<p>パスワードを忘れた方は、登録されているメールアドレスを送信してください。<br />
		新しいパスワードをメールでお知らせします。</p>
	<?php if ($currentPrefix == 'front'): ?>
		<?php echo $this->BcForm->create($userModel, array('action' => 'reset_password')) ?>
	<?php else: ?>
		<?php echo $this->BcForm->create($userModel, array('action' => 'reset_password', 'url' => array($this->request->params['prefix'] => true))) ?>
	<?php endif ?>
	<div class="submit">
		<label>メールアドレス<?php echo $this->BcForm->input($userModel . '.email', array('type' => 'email', 'placeholder'=>'メールアドレス')) ?></label>
		<?php echo $this->BcForm->submit('送信', array('div' => false, 'class' => 'btn-red button')) ?>
	</div>
	<?php echo $this->BcForm->end() ?>
</div>
