<?php
/**
 * [TOP] トップページタイトル一覧
 */

/**
 * 記事一覧に表示する文字数を入力して下さい
 */
$substr = 100;
?>

<?php if(empty($posts)): ?>
<?php else: ?>
	<?php foreach($posts as $key => $post): ?>
		<section itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
		<?php
		$blog = $this->BcBaser->getElement('eyeCatch2',array("post"=>$post))
		.'<h2 itemprop="name">'
		.$this->Blog->getPostTitle($post,false)
		.'</h2>'
		.'<p itemprop="description">'
		.$this->Blog->getPostContent($post,false,false,$substr)
		.'</p>';
		$this->Blog->postLink($post, $blog,array("class"=>"card","itemprop"=>"url"));
		?>
</section>
	<?php endforeach; ?>
<?php endif;
