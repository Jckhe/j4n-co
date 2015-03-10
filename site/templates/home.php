<?php snippet('header') ?>

<header class="block--header">

	<canvas id="canvas" resize="true"></canvas>

	<div class="block--fixed">
		<div data-0="transform:translate(0px,0px);opacity:1;" data-200="transform:translate(0px,-50px);opacity:0;" class="content-wrapper">
			<article class="right-textbox">
				<h1 class="headline glitch"><?php echo $page->headline() ?></h1>
				<h2 class="subhead"><?php echo $page->subhead() ?></h2>
				<?php echo kirbytext($page->text()) ?>
				<a href="#contact" class="button">
					Get In Touch
				</a>
			</article>
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
				<a href="<?= $page->file('jan_drewniak_resume.pdf')->url();?>" class="tile--button">
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
							
							<h1> 
								<?php echo $item->title(); ?> 
							</h1>
							<?= kirbytext($item->showcase_description()); ?>
							<a href="<?= $item->url() ?>" class="button--subtle">
								read more 
							</a>
							
							<div class="flat3D-scrollwrapper" data-50="transform:translate(0px,400px);" data-600="transform:translate(0px,0px);">
								<div style="background-image:url(<?php echo $item->images()->find('home_original.jpg')->url() ?>)" class="flat3D">
									<a class="button" href="<?= $item->url() ?>">Read more about <?php echo $item->title(); ?> </a>
								</div>
							</div>

							<label for="<?php echo $work->nth($work_index)->title(); ?>" class="icon-next"></label>

			

						</div>
					</article>
				<?php endforeach ?> 
			</div>

		</div>

	</section>


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


	<section class="content-block--below-fixed blog-section">

		<svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 50 50" preserveAspectRatio="none">
			<polygon points="50,0 0,50 50,50" fill="inherit" />
		</svg>

		<div class="content-wrapper">
			<h2 class="headline--vertical">Blog</h2>

			<div class="blog-link-section" style="float:left;margin-top: 40px; ">
				<?php $blog = $pages->find('blog')->children()->visible()->limit(7); ?> 
				<?php foreach( $blog as $item): ?>
					<a class="blog-link" href="<?php echo $item->url();?>"><?php echo $item->title(); ?></a>
				<?php endforeach ?> 
				<a href="/blog" class='button'>
					more articles over here
				</a>
			</div>
		</div>
	</section>

</main>

<?php snippet('footer', array('page_scripts' => 
							array($page->file('paper-core.js')->url(), 
								  $page->file('paperscript.js')->url(),  
								  $page->file('scrollr.min.js')->url() 
								  ) 
							)
			  ) ?>

