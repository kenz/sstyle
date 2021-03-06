<?php
/* SVN FILE: $Id$ */
/**
 * [PUBLISH] サイト内検索フォーム
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			baser.views
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
if (Configure::read('BcRequest.isMaintenance')) {
	return;
}
if (!empty($this->passedArgs['num'])) {
	$url = array('plugin' => null, 'controller' => 'contents', 'num' => $this->passedArgs['num']);
} else {
	$url = array('plugin' => null, 'controller' => 'contents');
}
?>
<nav class="search-box">
	<?php echo $this->BcForm->create('Content', array('type' => 'get', 'action' => 'search', 'url' => $url)) ?>
	<?php echo $this->BcForm->input('Content.q') ?>
	<?php echo $this->BcForm->submit('検索', array('div' => false, 'class' => 'submit_button')) ?>
	<?php echo $this->BcForm->end() ?>
</nav>
