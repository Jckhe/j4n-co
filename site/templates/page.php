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


<? snippet('footer') ?>