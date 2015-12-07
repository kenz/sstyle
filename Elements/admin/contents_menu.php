<?php
/**
 * [ADMIN] コンテンツメニュー
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2015, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2015, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 2.0.0
 * @license			http://basercms.net/license/index.html
 */
?>


<?php if (!empty($user)): ?>
	<div id="ContentsMenu">
		<ul class="clearfix">
			<?php if (!empty($search)): ?>
				<li><?php $this->BcBaser->link('<i class="material-icons">&#xE8B6;</i><br />検索', 'javascript:void(0)', array('id' => 'BtnMenuSearch')) ?></li>
			<?php endif ?>
			<?php if (!empty($help)): ?>
				<li><?php $this->BcBaser->link('<i class="material-icons">&#xE887;</i><br />ヘルプ', 'javascript:void(0)', array('id' => 'BtnMenuHelp')) ?></li>
			<?php endif ?>
			<?php if ($this->BcBaser->isAdminUser()): ?>
				<li><?php $this->BcBaser->link('<i class="material-icons">&#xE898;</i><br />制限設定', 'javascript:void(0)', array('id' => 'BtnMenuPermission')) ?></li>
			<?php endif ?>
		</ul>
	</div>
	<?php
 endif ?>
