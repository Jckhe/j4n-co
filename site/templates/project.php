<?php snippet('header') ?>

<?php if( $image = $page->image( $page->hero() ) ): ?>
	<div class="ł-hero" style="opacity:0.8;background-image:url('<?=$image->url()?>');"></div>
<?php else: ?>
	<div class="ł-hero"></div>
<?php endif; ?>

<main role="main" class="content-container--home ł-main--home">
	<?= snippet( 'site-logo' ) ?>
	<section class="ł-content-sections--thin--light post">
		<h1 class="page-title"><?= $page->title() ?></h1>
		<article class="ł-content-section post">
			<?= $page->text()->kirbytext() ?>
		</articles>
	</section>

	<section class="ł-content-sections--thin">
		<?php snippet('pagination') ?>
	</section>

</main>

<?php snippet('footer') ?>