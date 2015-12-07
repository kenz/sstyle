<?php
/**
 * ブログ詳細ページ
 */
$this->BcBaser->setDescription($this->Blog->getTitle());
?>
<article class="card single" itemscope itemtype="http://schema.org/WebPage">
	<?php $this->BcBaser->element('eyeCatch2',array("post"=>$post)); ?>
	<header><h1 itemprop="name"><?php $this->BcBaser->contentsTitle(); ?></h1></header>

	<?php echo str_replace(
	  array('<div class="post-body">','<div id="post-detail">'),
	  array('<div itemprop="about" class="post-body">','<div itemprop="text" class="post-detail">'),
	  $this->Blog->getPostContent($post)); ?>
	<footer>
		<p class="author" itemprop="author"><?php $this->Blog->author($post) ?></p>
		<time itemprop="datePublished" datetime="<?php echo str_replace("/","-",$this->Blog->getPostDate($post)) ?>">
			<?php $this->Blog->postDate($post) ?></time>
		<nav itemprop="keywords" class="category"><?php $this->Blog->category($post) ?></nav>
		<nav itemprop="keywords" class="tag_list"><?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?></nav>
	</footer>
</article>
<nav class="blog_sequence">
	<?php $this->Blog->prevLink($post,null,array("class"=>"prev")) ?>
	<?php $this->Blog->nextLink($post,null,array("class"=>"next")) ?>
</nav>
