<?php
/**
 * [ADMIN] ヘッダー
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
if (!empty($this->request->params['prefix'])) {
	$loginUrl = $this->request->params['prefix'] . '/users/login';
} else {
	$loginUrl = '/users/login';
}
?>
<div id="Header" class="clearfix">
	<?php $this->BcBaser->element('toolbar') ?>
	<?php if ($this->name == 'Installations' || $this->request->url == $loginUrl || $this->BcAdmin->isAdminGlobalmenuUsed()): ?>
		<div class="clearfix" id="HeaderInner">
			<div id="Logo">
				<?php if (!empty($user)): ?>
					<?php $this->BcBaser->link($this->BcBaser->getImg('admin/logo_header.svg', array('width' => 40, 'height' => 40, 'alt' => 'baserCMS')), array('plugin' => null, 'controller' => 'dashboard', 'action' => 'index')) ?>
				<?php else: ?>
					<?php $this->BcBaser->img('admin/logo_header.svg', array('width' => 40, 'height' => 40, 'alt' => 'baserCMS')) ?>
				<?php endif ?>
			</div>

			<?php if (!empty($user)): ?>
				<div id="GlobalMenu" class="clearfix">
					<ul class="clearfix">
						<li><?php $this->BcBaser->link('<i class="material-icons">&#xE89C;</i><br />ページ追加', "/admin/blog/blog_posts/add/1") ?></li>
						<li><?php $this->BcBaser->link('<i class="material-icons">&#xE150;</i><br />ページ管理', "/admin/blog/blog_posts/index/1") ?></li>
						<li><?php $this->BcBaser->link('<i class="material-icons">&#xE413;</i><br />テーマ', array('plugin' => '', 'controller' => 'themes', 'action' => 'index')) ?></li>
						<li><?php $this->BcBaser->link('<i class="material-icons">&#xE87B;</i><br />プラグイン', array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')) ?></li>
						<li><?php $this->BcBaser->link('<i class="material-icons">&#xE8B8;</i><br />システム', array('plugin' => '', 'controller' => 'site_configs', 'action' => 'form')) ?></li>
					</ul>
				</div>
			<?php endif ?>


		</div>
	<?php endif ?>
<!-- / #Header .clearfix --></div>
