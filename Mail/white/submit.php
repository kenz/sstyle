<?php
/**
 * メールフォーム送信完了ページ
 */
if (Configure::read('debug') == 0) {
	$this->addScript($this->Html->meta(array('http-equiv' => 'Refresh'), null, array('content' => '5;url=' . $mailContent['MailContent']['redirect_url'])));
}
?>
<div class="mail mail_submit">
	<h1>
		<?php $this->BcBaser->contentsTitle() ?>
	</h1>
	<div class="mail_submit_message">
		<h2>お問い合わせ完了</h2>

		<p>お問い合わせ頂きありがとうございました。<br />
			確認次第、ご連絡させて頂きます。</p>
		<?php if ($mailContent['MailContent']['redirect_url']): ?>
			<p>※５秒後にトップページへ自動的に移動します。</p>
			<p><a href="<?php echo $mailContent['MailContent']['redirect_url'] ?>">移動しない場合はコチラをクリックしてください。≫</a> </p>
		<?php endif; ?>
	</div>
</div>
