<?php snippet('header') ?>

<?php if( $image = $page->image( $page->hero() ) ): ?>
<div class="ł-hero" style="opacity:0.8;background-position: center center;background-image:url('<?=$image->url()?>');"></div>
<?php else: ?>
<div class="ł-hero"></div>
<?php endif; ?>

<main role="main" class="content-container--home ł-main--home">
	<?= snippet( 'site-logo' ) ?>

	<div class="ł-content-sections--thin--light post">
		<h1 class="page-title"><a href="/portfolio">Portfolio</a></h1>
		<?= $page->text()->kirbytext() ?>
		<section class="ł-content-section">
		<h2 class="section-title">Selected Work</h2>
			<div class='ł-flex-thumbs'>
				<?php foreach ($page->children()->visible() as $project): ?>
					<?= snippet('project-thumb', ['project' => $project] ) ?>
				<?php endforeach ?>
			</div>
		</section>
	</div>
</main>

<?php snippet('footer') ?>
