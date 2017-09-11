<?php

return function($site, $pages, $page) {

	// get all articles and add pagination
	$years = $site->find('blog')->children()->visible()->sortBy('date', 'desc')->group(function($p){
		return $p->date('Y');
	  });
	//$years = $site->find('blog')->children()->visible()->sortBy('date', 'desc')->groupBy('year');

	$tags = $site->find('blog')->children()->visible()->pluck('tags', ',', true);

	if($tag = param('tag')) {
		$years = $site->find('blog')->children()->visible()->filterBy('tags', $tag, ',')->sortBy('date', 'desc')->group(function($p){
			return $p->date('Y');
		});
	}

	return compact('years', 'tags', 'subtitle', 'tag');

};