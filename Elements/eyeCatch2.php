<?php
// Retina対応のEyeCatch

//画像のパスを取得したいだけ
$retinaImagePath = str_replace('" class="img-eye-catch" alt="" />','',str_replace('<img src="','', ($this->Blog->getEyeCatch($post,array("link"=>false)))));
$imagePath = str_replace('" class="img-eye-catch" alt="" />','',str_replace('<img src="','', ($this->Blog->getEyeCatch($post,array("mobile"=>true,"link"=>false)))));
if($imagePath == "" || $retinaImagePath == ""){

}else{
	echo "<img src='{$imagePath}' itemprop='image' alt='' srcset='{$retinaImagePath} 2x' />";
}
