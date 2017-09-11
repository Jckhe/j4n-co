<?php snippet('header') ?>

<main role="main" class="content-container ł-main">
	<?= snippet( 'site-logo' ) ?>


	<section class="ł-content-sections--thin">
		<h1 class="page-title"><?= $page->title() ?></h1>

		<article class="ł-content-section post">
			<?= $page->text()->kirbytext() ?>
		</articles>
		<hr>
		<aside>
		<time datetime="<?= date( 'd-m-Y', $page->date() )?>">Published <?= date( 'F j, Y', $page->date() )?></time>
		</aside>
		<aside class="ł-content-section">
			<?php if ( !$page->tags()->empty() ): ?>
				<span class="section-title"> tagged</span>
				<?= snippet( 'post-tags', array('tags' => str::split( $page->tags() ) ) ); ?>
			<?php endif; ?>
		</aside>
		<hr>
	</section>

	<section class="ł-content-sections--thin">
		<?php snippet('pagination') ?>
	</section>

</main>
<?php snippet('footer') ?>