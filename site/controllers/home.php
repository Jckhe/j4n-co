<?php

return function($site, $pages, $page) {

	// get all articles and add pagination
	$recentPosts = $site->find('blog')->children()->visible()->limit(3);
	$recentExperiments = $site->find('lab')->children()->visible()->limit(5);
	$recentProjects = $site->find('portfolio')->children()->visible();

	// pass $articles and $pagination to the template
	return compact('recentPosts', 'recentExperiments', 'recentProjects');

};