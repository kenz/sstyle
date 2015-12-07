<?php
$crumbs = $this->BcBaser->getCrumbs();
if (!empty($crumbs)) {
	$crumbpsPosition = 2;?>
	<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<?php $this->BcBaser->link($this->BcBaser->getImg("logo.svg",array('alt' => 'top','title' => 'top','width'=>'32','height'=>'32')),"/",array("itemprop"=>"item")); ?>
		<meta itemprop='position' content='1' />
	</span>
	<span itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
	<?php
	foreach ($crumbs as $key => $crumb) {
		if ($this->BcArray->last($crumbs, $key + 1)) {
			if ($crumbs[$key + 1]['name'] == $crumb['name']) {
				continue;
			}
		}
		if ($this->BcArray->last($crumbs, $key)) {
			if ($this->viewPath != 'home' && $crumb['name']) {
				$this->BcBaser->addCrumb($crumb['name'],null);
			} elseif ($this->name == 'CakeError') {
				$this->BcBaser->addCrumb('<strong>404 NOT FOUND</strong>');
			}
		} else {
			$this->BcBaser->addCrumb($crumb['name']."<meta itemprop='position' content='{$crumbpsPosition}' />", $crumb['url'], array("itemprop"=>"item"));
			$crumbpsPosition ++;

		}
	}
}
$this->BcBaser->crumbs('</span> &gt; <span itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">');
?>
</span>
