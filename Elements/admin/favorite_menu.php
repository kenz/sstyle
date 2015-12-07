<?php
/**
 * [ADMIN] よく使う項目
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
$this->BcBaser->js('admin/baser_favorite');
?>


<div id="FavoriteDeleteUrl" style="display: none"><?php $this->BcBaser->url(array('plugin' => null, 'controller' => 'favorites', 'action' => 'ajax_delete')) ?></div>
<div id="FavoriteAjaxSorttableUrl" style="display:none"><?php $this->BcBaser->url(array('plugin' => null, 'controller' => 'favorites', 'action' => 'update_sort')) ?></div>

<div id="FavoriteMenu" class="cbb">

	<h2><i class="material-icons">&#xE87D;</i>よく使う項目</h2>

	<ul class="favorite-menu-list">
		<?php if ($favorites): ?>
			<?php foreach ($favorites as $favorite): ?>
				<?php $this->BcBaser->element('favorite_menu_row', array('favorite' => $favorite)) ?>
			<?php endforeach ?>

		<?php else: ?>
			<li class="no-data">新規登録ボタンよりよく使う項目を登録しておく事ができます。</li>
		<?php endif ?>
	</ul>

	<ul class="favolite-menu-tools clearfix">
		<?php //srcやaltは不要ですが、JavaScriptでerrorを発生させないようにするため残しています 消す場合はJavaScriptの修正が必要です ?>
		<li><p src="/app/webroot/theme/sstyle/img/admin/btn_add.png" alt="新規追加" id="BtnFavoriteAdd" class="btn firstChild lastChild empty virtul_link"><i class="material-icons">&#xE147;</i>新規追加</p></li>
		<li><p src="/app/webroot/theme/sstyle/img/admin/btn_menu_help.png" alt="ヘルプ" class="btn help firstChild empty virtul_link" id="BtnFavoriteHelp"><i class="material-icons">&#xE887;</i>ヘルプ</p>
			<div class="helptext">
				<p>よく使う項目では、新規登録ボタンで現在開いているページへのリンクを簡単にする事ができます。<br />また、登録済の項目を右クリックする事で編集・削除が行えます。</p>
			</div>
		</li>
	</ul>

</div>

<div id="FavoriteDialog" title="よく使う項目" style="display:none">
	<?php echo $this->BcForm->create('Favorite', array('action' => 'ajax', 'url' => array('plugin' => null))) ?>
	<?php echo $this->BcForm->input('Favorite.id', array('type' => 'hidden')) ?>
	<dl>
		<dt><?php echo $this->BcForm->label('Favorite.name', 'タイトル') ?></dt><dd><?php echo $this->BcForm->input('Favorite.name', array('type' => 'text', 'size' => 30, 'class' => 'required')) ?></dd>
		<dt><?php echo $this->BcForm->label('Favorite.url', 'URL') ?></dt><dd><?php echo $this->BcForm->input('Favorite.url', array('type' => 'text', 'size' => 30, 'class' => 'required')) ?></dd>
	</dl>
	<?php echo $this->BcForm->end() ?>
</div>


<ul id="FavoritesMenu" class="context-menu" style="display:none">
    <li class="edit"><?php $this->BcBaser->link('編集', '#FavoriteEdit') ?></li>
    <li class="delete"><?php $this->BcBaser->link('削除', '#FavoriteDelete') ?></li>
</ul>
