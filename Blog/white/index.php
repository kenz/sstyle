<?php
/**
 * ブログトップ
 */
$this->BcBaser->setDescription($this->Blog->getDescription());
?>
<article>
<h1 itemprop="headline"><?php $this->Blog->title() ?></h1>
<?php if (!empty($posts)): ?>
	<?php foreach ($posts as $post): ?>
		<section itemscope itemtype="http://schema.org/WebPageElement">
		<?php
		$blog = ''
		.$this->BcBaser->getElement('eyeCatch2',array("post"=>$post))
		.'<h2 itemprop="name">'
		.$this->Blog->getPostTitle($post,false)
		.'</h2>'
		.'<div itemprop="about">'
		.$this->Blog->getPostContent($post,false,false)
		.'</div>'
		;
		$this->Blog->postLink($post, $blog,array("class"=>"card","itemprop"=>"url"));
		?>
		</section>
	<?php endforeach; ?>
</article>
<?php else: ?>
	<p class="no-data">記事がありません。</p>
<?php endif; ?>

<?php $this->BcBaser->pagination('simple');
