<?php snippet('header') ?>

<header class="container--header">
	
	<div class="container--fixed">
		<div class="overlay" style="background-image: url('<?php echo $page->file('header.jpg')->url()?>');"></div> 

		<div class="block--headlines">
			<h1 class="headline"><?php echo $page->headline() ?></h1>
			<h2 class="subhead"><?php echo $page->subhead() ?></h2>
		</div>
	</div>

</header>

<main class="main" role="main">

<section id="blog" class="container--below-fixed blog-section skin--white">

	<svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 50 50" preserveAspectRatio="none">
		<polygon points="50,0 0,50 50,50" fill="inherit" />
	</svg>
	
	<h2 class="headline--vertical">Blog</h2>

	<div class="row">

		<?php $blog = $pages->find('blog')->children()->visible(); ?> 
		<?php foreach( $blog as $item): ?>
			
			<article class="post-summary">
				<time itemprop="datePublished" pubdate datetime="<?= $item->date('m/d/Y')?>" title="<?= $item->date('M d, Y')?>"><span class="date"> <?= $item->date('m/d')?></span><span class="year"><?= $item->date('Y')?></span></time>
				<a class="blog-link" href="<?php echo $item->url();?>"><?php echo $item->title(); ?></a>
			</article>

		<?php endforeach ?> 
	
	</div>

</section>

</main>

<? snippet('footer') ?>