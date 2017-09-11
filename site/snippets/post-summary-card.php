<article class="post-summary">
	<a href="<?= $post->url() ?>">
		<h1> <?= $post->title() ?> </h1>
		<p>
			<?= excerpt( $post->snippet()->text(), 100 ) ?>
		</p>
	</a>
	<aside class="post-meta">
		<time datetime="<?= date( 'D-M-Y', $post->date() )?>"><?= date( 'F j, Y', $post->date() )?></time>
		<?= snippet( 'post-tags', array('tags' => str::split( $post->tags() ) ) ); ?>
	</aside>
</article>
