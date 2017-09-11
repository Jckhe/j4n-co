<article class="post-summary--list">
	<a href="<?= $post->url() ?>">
		<h3> <?= $post->title() ?> </h3>
	</a>

	<p>
		<?= excerpt( $post->text(), 300 ) ?>
		<a href="#">read more</a>
	</p>
	<aside class="post-meta">
		<time datetime="2016-05-15"><?= date( 'F j, Y', $post->date() )?></time>
		<?= snippet( 'post-tags', array('tags' => str::split( $post->tags() ) ) ); ?>
		</aside>
</article>
