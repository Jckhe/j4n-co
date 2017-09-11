<?php snippet('header') ?>

<main role="main" class="content-container ł-main">
	<?= snippet( 'site-logo' ) ?>


	<div class="ł-content-sections--thin">
		<h1 class="page-title"><a href="/blog">Blog</a></h1>

		<section class="ł-content-section">
			<span class="section-title"> tags</span>

			<p>
				<?= snippet( 'post-tags', array('tags' => str::split( $tags ), 'active_tag' => $tag ) ); ?>
			</p>
		</section>
		<?php foreach($years as $year => $items): ?>
			<section class="ł-content-section">

				<h2 class="section-title"><?php echo $year ?></h2>
				<?php foreach ($items as $post): ?>
						<?= snippet('post-summary-list',['post' => $post] ) ?>
				<?php endforeach ?>
			</section>
		<?php endforeach ?>
		</section>
	</div>
</main>

<?php snippet('footer') ?>
