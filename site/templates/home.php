<? snippet('header') ?>
<? snippet('site_nav') ?>
<? $home_page = $pages->findBy('display_on_home_page', 'on'); ?>

<? if ($home_page->template() == "fullscreen_iframe"): ?>
	<iframe class="lab" src="<?= $home_page->location() ?>"></iframe>
<? else: ?>
	<?= $home_page->text() ?>
<? endif ?>

<? snippet('footer') ?>