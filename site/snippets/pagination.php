<div class="prevnext">
	<?php if($page->hasPrevVisible()): ?>
		<a class="prevnext__next" href="<?php echo $page->prevVisible()->url() ?>"><span class="arrow-next">‹</span>Newer </a>
	<?php else: ?>
		<a class="prevnext__next"></a>
	<?php endif ?>

	<a class="prevnext__all" href="<?= $page->parent()->url() ?>"><?= $page->parent()->title()?></a>

	<?php if($page->hasNextVisible()): ?>
		<a class="prevnext__prev" href="<?php echo $page->nextVisible()->url() ?>">Older <span class="arrow-prev">›</span></a>
	<?php else: ?>
		<a class="prevnext__prev"></a>
	<?php endif ?>
</div>