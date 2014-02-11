<? snippet('header') ?>

<style>
<?= $page->custom_css() ?>
</style>

<? snippet('site_nav') ?>


<section class='main has_shadow'>
  <article>
    <div class='centered_measure with_top_margin with_bottom_margin thoughts'>
      <h1 class='text_shadow'>
        <?= $page->title() ?>
      </h1>
      <?= kirbytext($page->text()) ?>
    </div>
  </article>
</section>

<? if($page->hasNextVisible()): ?>
<div class="nav_flipper right">
  <div class="next">
    <a class="pixel_font" href="<?= $page->nextVisible()->url() ?>">
        >
    </a>
  </div>
</div>
<? endif ?>

<? if($page->hasPrevVisible()): ?>
<div class="nav_flipper left">
  <div class="previous">
    <a class="pixel_font" href="<?= $page->prevVisible()->url() ?>">
      <
    </a>
  </div>
</div>
<? endif ?>

<? snippet('footer') ?>