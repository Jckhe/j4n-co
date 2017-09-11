<?php snippet('header') ?>

<div class="ł-hero site-header">
	<?= snippet('experiment-iframe', ['page' => $page->children()->find('src')] ) ?>
</div>

<main role="main" class="content-container--home ł-main--home">
	<?= snippet( 'site-logo' ) ?>


	<div class="ł-content-sections">
		<h1 class="page-title"><a href="/lab">Lab</a></h1>

		<section class="ł-content-section">
			<div class='ł-flex-thumbs'>
				<?php foreach ($experiments as $experiment): ?>
					<?= snippet('experiment-thumb', ['experiment' => $experiment] ) ?>
				<?php endforeach ?>
			</div>
		</section>
	</div>
</main>

<?php snippet('footer') ?>
