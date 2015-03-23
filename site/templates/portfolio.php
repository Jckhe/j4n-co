<?php snippet('header') ?>

<header class="container--header">
	
	<div class="block--fixed">
		<div class="overlay" style="background-image: url('<?php echo $page->file('header.jpg')->url()?>');"></div> 
		<div class="block--headlines">
			<h1 class="headline"><?php echo $page->headline() ?></h1>
			<h2 class="subhead"><?php echo $page->subhead() ?></h2>
		</div>
	</div>
</header>

<main class="main" role="main">

<section class="content-block--below-fixed work-section">

	<svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" preserveAspectRatio="none">
		<polygon points="50,0 0,50 50,50" fill="inherit" />
	</svg>


	<div class="content-wrapper">
		<h2 class="headline--vertical" data-50="transform:translate(0px,200px);" data-500="transform:translate(0px,0px);">work</h2>

		<div class="tiles" data-50="transform:translate(0px,400px);" data-500="transform:translate(0px,0px);">
			<?php $work = $pages->find('portfolio')->children()->visible(); ?> 

			<?php foreach( $work as $item): ?>
				<label for="<?php echo $item->title(); ?>">
					<div class="tile" style="background-image:url(<?php echo $item->files()->find('icon.jpg', 'icon.png')->first()->url(); ?>);"></div>
					<?php echo $item->title(); ?>
				</label>
			<?php endforeach ?> 
			<a href="#" class="tile--button">
				download <strong>CV</strong>
			</a>

		</div>

		<div class="tiles-showcase" data-50="transform:translate(0px,600px);" data-500="transform:translate(0px,0px);">

			<?php $work_index = 0; ?>

			<?php foreach( $work as $item): ?>

				<?php 
				$work_index+= 1; 

				if ( $work_index >= $work->count() ){
					$work_index = 0; 
				}

				?>


				<?php if($item->title() == $work->first()->title() ): ?>
					<input class="tab-toggle" type="radio" name="showcase-item" id="<?php echo $item->title(); ?>" checked />
				<?php else: ?>
					<input class="tab-toggle" type="radio" name="showcase-item" id="<?php echo $item->title(); ?>" />
				<?php endif; ?>  

				<article class="tile-showcase"  class="tile-showcase-item"> 
					<div class="showcase-gallery">
						
						<h1 style="margin-left:30px;"> 
							<?php echo $item->title(); ?> 
						</h1>
						<p>
						 	Staff Scheduling Made Simple. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur blanditiis numquam, illum eveniet deleniti, culpa nihil labore autem officiis, maiores eius earum nemo quod totam. Reiciendis in, quasi natus cum.
								<?#= kirbytext($item->text()); ?>
						</p> 
						<a href="<?= $item->url() ?>" class="button" style="margin-left:30px;">
							Read more 
						</a>
						
						<div data-50="transform:translate(0px,600px);" data-600="transform:translate(0px,0px);">
							<img src="<?php echo $item->images()->find('home_original.jpg')->url() ?>" class="flat3D"/>
						</div>

						<label for="<?php echo $work->nth($work_index)->title(); ?>" class="icon-next"></label>

		

					</div>
				</article>
			<?php endforeach ?> 
		</div>

	</div>

</section>

</main>

<? snippet('footer') ?>