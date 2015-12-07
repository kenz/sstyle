<?php
/**
 * ページ全体の処理を行っています
 */
/**
 * トップページに表示する記事の数を設定します
 */
$top_count = 20;
/**
 * BLOGページ内で表示する記事の数を設定します
 */
$blog_count = 50;
?>
<!DOCTYPE html>
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml" itemscope itemtype="http://schema.org/WebPage">
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,minimal-ui,maximum-scale=1">
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $this->BcBaser->getUri("");?>" />
	<?php if ($this->BcBaser->isHome()): ?>
		<meta property="og:title"  content="<?php echo $this->BcBaser->getTitle();?>" />
	<?php else:?>
		<meta property="og:title"  content="<?php $this->BcBaser->contentsTitle();?>" />
	<?php endif?>
	<?php if ($this->BcBaser->isBlogSingle()): ?>
		<?php $imagePath = str_replace('" class="img-eye-catch" alt="" />','',str_replace('<img src="','', ($this->Blog->getEyeCatch($post,array("mobile"=>true,"link"=>false)))));?>
			<meta property="og:image"  content="<?php
			// eye catchの絶対パスを取得中 getUrlの第一引数にeye catchのURLを渡しても正しく取得できない
			 $imageUrl =$this->BcBaser->getUrl("/",true,false).$imagePath;
			 echo str_replace(array('//app','index.php/'),array('/app',''),$imageUrl);?>" />
			 <meta property="og:description"  content="<?php echo $this->Blog->getPostContent($post,false,false,100) ?>" />
		<?php endif ?>
		<meta property="og:site_name" content="<?php echo $this->BcBaser->siteConfig['name'];	?>" />
		<?php $this->BcBaser->charset() ?>
		<?php if ($this->BcBaser->isHome()): ?>
			<?php $this->BcBaser->title(); ?>
		<?php else: ?>
			<title><?php $this->BcBaser->contentsTitle(); ?></title>
		<?php endif ?>
		<?php $this->BcBaser->metaDescription() ?>
		<?php $this->BcBaser->metaKeywords() ?>
		<?php $this->BcBaser->icon() ?>
		<?php $this->BcBaser->rss('ニュースリリース RSS 2.0', '/news/index.rss') ?>
		<?php $this->BcBaser->css('black') ?>
		<?php
		$this->BcBaser->js(array(
		    'admin/jquery-1.7.2.min',
		    'admin/jquery.colorbox-min-1.4.5',
		    'admin/functions',
		    'jquery.bxSlider.min',
		    'jquery.easing.1.3',
		    'config',
		    'jquery.masonry.pkgd.js'
		))
		?>
		<?php $this->BcBaser->scripts() ?>
		<?php $this->BcBaser->element('google_analytics') ?>
	</head>
	<body id="<?php $this->BcBaser->contentsName() ?>">
		<?php if ($this->BcBaser->isHome()): ?>
			<h1 itemprop="headline"><?php echo $this->BcBaser->getTitle();?></h1>
			<h2>マイナスのデザインから<br />ZENのデザインへ</h2>
			<?php $this->BcBaser->blogPosts("data", $top_count, array("tag" => "TOP"));?>
		<?php else: ?>
			<?php $this->BcBaser->header() ?>
			<?php $this->BcBaser->content(); ?>
		<?php endif ?>
		<?php $this->BcBaser->footer() ?>
		<?php $this->BcBaser->func() ?>
		<script>
			$(function() {

				<?php
				// スマートURLを使用していない時にeye-catchが使用できないバグを回避するロジック
				?>
				$('.img-eye-catch').error(function() {
					imageUrl = $(this).attr('src');
					i = location.href.lastIndexOf("index.php/");
					if(i===-1){
						imageUrl = "app/webroot"+imageUrl;
					}else{
						imageUrl = "../app/webroot"+imageUrl;
					}
					$(this).attr({
						src: imageUrl
					});
				});
			});
		</script>
	</body>
</html>
