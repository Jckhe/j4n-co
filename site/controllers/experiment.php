<?php

return function($site, $pages, $page) {

	$experiments = $site->find('lab')->children()->visible();

	// pass $articles and $pagination to the template
	return compact('experiments');

};