<? $home = $pages->find('home') ?>
<? snippet('header') ?>

<style>
<?= $page->custom_css() ?>
</style>

<? snippet('site_nav') ?>


<section class='main has_shadow'>
  <article itemscope itemtype="http://schema.org/BlogPosting">
    <div class='centered_measure with_top_margin with_bottom_margin thoughts'>
      <h1 itemprop='headline' class='text_shadow'>
        <?= $page->title() ?>
      </h1>

      <aside> 
        <address  class="author">Written by <a rel="author" href="https://plus.google.com/+JanDrewniak">Jan Drewniak</a></address> 
        on <time itemprop="datePublished" pubdate datetime="<?= $page->date('m/d/Y')?>" title="<?= $page->date('M d, Y')?>"><?= $page->date('M d, Y')?></time>
      </aside>
      <div class="article-body" itemprop='articleBody'>
      <?= kirbytext($page->text()) ?>
      </div>
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