<?php
/**
 * ブログアーカイブ一覧
 */

 fugafuga
 hogehoge

$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->BcBaser->getContentsTitle() . 'のアーカイブ一覧です。');
$substr = 100;
?>

	<?php if (empty($posts)): ?>
	<?php else: ?>
		<?php foreach ($posts as $key => $post): ?>
			<section itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
				<?php
				$blog = $this->BcBaser->getElement('eyeCatch2',array("post"=>$post))
				.'<h2 itemprop="name">'
				.$this->Blog->getPostTitle($post,false)
				.'</h2>'
				.'<p itemprop="about">'
				.$this->Blog->getPostContent($post,false,false,$substr)
				.'</p>'
				;
				$this->Blog->postLink($post, $blog,array("class"=>"card", "itemprop"=>"url"));
				?>
			</section>
			<?php endforeach; ?>
	<?php endif; ?>
<?php $this->BcBaser->pagination('simple'); ?>
