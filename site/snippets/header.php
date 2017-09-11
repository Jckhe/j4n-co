<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>
		<?= $page->title() ?> | <?= $site->title() ?>
	</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- Place favicon.ico in the root directory -->
	<!-- kirby scss plugin -->
	<?php snippet('scss') ?>
	<?php echo css('@auto') ?>

</head>
<body>
<!--[if lte IE 9]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
