<?php
	if (!empty($this->Blog->blogContent['tag_use'])){
		$allTags = ($post["BlogTag"]);
		if (!empty($allTags)){
			$first = true;
			foreach($allTags as $tag){
				if("TOP"!=$tag["name"] ){
					if($first){
						echo "Tags:";
						$first = false;
					}else{
						echo " ";
					}
					$this->BcBaser->link( $tag["name"] , "/data/archives/tag/".$tag["name"]);
				}
			}
		}
	}
