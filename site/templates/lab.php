<? snippet('header') ?>
<? snippet('site_nav') ?>

<section class="main has_shadow">

  <article class="centered_measure with_top_margin with_bottom_margin">
  <h1>
  	<?= $page->title() ?>
  </h1>
<?= kirbytext($page->text()) ?>

<? foreach ($page->children()->visible() AS $p): ?>
<a class='thumbnail large_thumbnail has_shadow' href='<?= $p->url() ?>'>
<p class='page_description white_pixel_font large'>
  <?= $p -> title() ?>
</p>
<img src='<?= $p->files()->find('icon.png')->url()?>' />
</a>
<? endforeach ?> 
  </article>
</section>

<? snippet('footer') ?>