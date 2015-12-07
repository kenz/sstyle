<?php
/**
 * [ADMIN] ブログ記事 一覧　テーブル
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2015, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2015, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
?>


<!-- pagination -->
<?php $this->BcBaser->element('pagination') ?>

<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
<thead>
	<tr>
		<th class="list-tool">
			<div>
			<?php if ($newCatAddable): ?>
				<?php $this->BcBaser->link('<i class="material-icons">&#xE147;</i>新規追加', array('action' => 'add', $blogContent['BlogContent']['id'])) ?>
			<?php endif ?>
			</div>
			<?php if ($this->BcBaser->isAdminUser()): ?>
			<div>
				<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => '一括選択')) ?>
				<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('publish' => '公開', 'unpublish' => '非公開', 'del' => '削除'), 'empty' => '一括処理')) ?>
				<?php echo $this->BcForm->button('適用', array('id' => 'BtnApplyBatch', 'disabled' => 'disabled')) ?>
			</div>
			<?php endif ?>
		</th>
		<th><?php echo $this->Paginator->sort('no', array('asc' => ' <i class="material-icons">&#xE5C7;</i> NO', 'desc' => '<i class="material-icons">&#xE5C5;</i> NO'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th><?php echo $this->Paginator->sort('posts_date', array('asc' => '<i class="material-icons">&#xE5C7;</i> 投稿日', 'desc' => '<i class="material-icons">&#xE5C5;</i> 投稿日'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th>
			<?php echo $this->Paginator->sort('BlogCategory.name', array('asc' => '<i class="material-icons">&#xE5C7;</i> カテゴリ', 'desc' => '<i class="material-icons">&#xE5C5;</i> カテゴリ'), array('escape' => false, 'class' => 'btn-direction')) ?>
			<?php if ($blogContent['BlogContent']['tag_use']): ?>
			<span class="tag">タグ</span>
			<?php endif ?><br />
			<?php echo $this->Paginator->sort('name', array('asc' => '<i class="material-icons">&#xE5C7;</i> タイトル', 'desc' => '<i class="material-icons">&#xE5C5;</i> タイトル'), array('escape' => false, 'class' => 'btn-direction')) ?>
		</th>
		<th><?php echo $this->Paginator->sort('user_id', array('asc' => '<i class="material-icons">&#xE5C7;</i> 作成者', 'desc' => '<i class="material-icons">&#xE5C5;</i> 作成者'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<th><?php echo $this->Paginator->sort('status', array('asc' => '<i class="material-icons">&#xE5C7;</i> 公開状態', 'desc' => '<i class="material-icons">&#xE5C5;</i> 公開状態'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		<?php if ($blogContent['BlogContent']['comment_use']): ?>
			<th>コメント</th>
		<?php endif ?>
		<th>
			<?php echo $this->Paginator->sort('created', array('asc' => '<i class="material-icons">&#xE5C7;</i> 登録日', 'desc' => '<i class="material-icons">&#xE5C5;</i> 登録日'), array('escape' => false, 'class' => 'btn-direction')) ?><br />
			<?php echo $this->Paginator->sort('modified', array('asc' => '<i class="material-icons">&#xE5C7;</i> 更新日', 'desc' => '<i class="material-icons">&#xE5C5;</i> 更新日'), array('escape' => false, 'class' => 'btn-direction')) ?>
		</th>
	</tr>
</thead>
<tbody>
<?php if (!empty($posts)): ?>
	<?php foreach ($posts as $data): ?>
		<?php $this->BcBaser->element('blog_posts/index_row', array('data' => $data)) ?>
	<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="9"><p class="no-data">データが見つかりませんでした。</p></td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<!-- list-num -->
<?php $this->BcBaser->element('list_num') ?>
