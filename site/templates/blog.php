<?php snippet('header') ?>

<header class="block--header">
	
	<div class="block--fixed">
		<div class="overlay" style="background-image: url('<?php echo $page->file('header.jpg')->url()?>');"></div> 

		<div class="block--headlines">
			<h1 class="headline"><?php echo $page->headline() ?></h1>
			<h2 class="subhead"><?php echo $page->subhead() ?></h2>
		</div>
	</div>
</header>

<main class="main" role="main">

<section class="content-block--below-fixed blog-section">

	<svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 50 50" preserveAspectRatio="none">
		<polygon points="50,0 0,50 50,50" fill="inherit" />
	</svg>

	<div class="content-wrapper">
		<h2 class="headline--vertical">Blog</h2>

		<div class="blog-link-section" style="float:left;margin-top: 40px; ">
			<?php 
			function getFirstPara($string){
			    $string = substr($string,0, strpos($string, "</p>")+4);
			    //$string = str_replace("<p>", "", str_replace("<p/>", "", $string));
			    return $string;
			};
			?>

			<?php $blog = $pages->find('blog')->children()->visible(); ?> 
			<?php foreach( $blog as $item): ?>
				<article class="post-summary">
					<time itemprop="datePublished" pubdate datetime="<?= $item->date('m/d/Y')?>" title="<?= $item->date('M d, Y')?>"><span class="date"> <?= $item->date('m/d')?></span><span class="year"><?= $item->date('Y')?></span></time>
					<a class="blog-link" href="<?php echo $item->url();?>"><?php echo $item->title(); ?></a>
					<?php 
						$string = $item->text();
					    $text = getFirstPara( kirbytext( $string ) );
					?> 
					<?php echo $text; ?>
						
				</article>
			<?php endforeach ?> 
		</div>
	</div>
</section>

</main>

<? snippet('footer') ?>