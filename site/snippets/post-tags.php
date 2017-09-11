<?php if ( !isset($active_tag) ) { $active_tag = ''; } ?>
<?php foreach ($tags as $tag): ?>
	<a class="tag <?= $tag === $active_tag ? ' tag--active' : ''?>" href="/blog/tag:<?= $tag ?>"><?= $tag ?></a>
<?php endforeach ?>
