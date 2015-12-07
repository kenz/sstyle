
<nav>
<h1><?php $this->BcBaser->contentsTitle() ?></h1>
	<?php if (!empty($this->Paginator)): ?>
		<p><?php echo $this->Paginator->counter(array('format' => '<strong>' . implode(' ', $query) . '</strong> で検索した結果 <strong>%start%〜%end%</strong>件目 / %count% 件')) ?></p>
	<?php endif ?>
	<!-- list-num -->
	<?php if ($datas): ?>
		<?php foreach ($datas as $data): ?>
			<section class="card">
				<h2><?php $this->BcBaser->link($this->BcBaser->mark($query, $data['Content']['title']), $data['Content']['url']) ?></h2>
					<p><?php echo $this->BcBaser->mark($query, $this->Text->truncate($data['Content']['detail'], 100)) ?></p>
					<p class="url"><?php $this->BcBaser->link(fullUrl($data['Content']['url']), $data['Content']['url']) ?></p>
				</h2>
			</section>
		<?php endforeach ?>
	<?php else: ?>
		<p class="card system-message">該当する結果が存在しませんでした。</p>
	<?php endif ?>
	<?php $this->BcBaser->element('list_num') ?>
	<!-- pagination -->
	<?php $this->BcBaser->pagination('simple', array(), array('subDir' => false)) ?>
</nav>
