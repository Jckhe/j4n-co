<?php snippet('header') ?>

<header class="block--header">
	
	<div class="block--fixed" style="background-image: url('/assets/images/poz.jpg');">
		<div class="block--headlines">
			<h1 class="headline"><?php echo $page->headline() ?></h1>
			<h2 class="subhead"><?php echo $page->subhead() ?></h2>
		</div>
	</div>
</header>

<main class="main" role="main">

<section class="content-block--below-fixed lab-section" style="margin-bottom:0;">

	<svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" preserveAspectRatio="none">
		<polygon points="0,50 50,50 0,0" fill="inherit" />
	</svg>

	<div class="content-wrapper--vertical-flex" style="padding-top: 0px;padding-bottom:0px;margin-bottom:0;">
		<h2 class="headline--vertical">Lab</h2>

		<?php $lab = $pages->find('lab')->children()->visible(); ?> 
		<?php foreach( $lab as $item): ?>
			<a href="<?php echo $item->url(); ?>" class="tile lab <?php echo $item->template();?>" style="top:<?php echo rand(50, -50);?>px; background-image:url(<?php echo $item->files()->find('icon.jpg', 'icon.png')->first()->url(); ?>);"></a>
		<?php endforeach ?> 

	</div>
</section>

</main>

<? snippet('footer') ?>