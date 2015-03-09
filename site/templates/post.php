<? snippet('header') ?>


<? // PREV NEXT PAGES ?>

<? if($page->hasNextVisible()): ?>
  <? $nextPageUrl = $page->nextVisible()->url() ?>
  <? else: ?>
  <? $nextPageUrl = $page->siblings()->visible()->first()->url() ?>
<? endif ?>

<? if($page->hasPrevVisible()): ?>
  <? $prevPageUrl = $page->prevVisible()->url() ?>
  <? else: ?>
  <? $prevPageUrl = $page->siblings()->visible()->last()->url() ?>
<? endif ?>


<style>
<?= $page->custom_css() ?>
</style>

<a class='prevnext-nav prev' href='<?= $prevPageUrl ?>'>&lt;</a>

<a class='prevnext-nav next' href='<?= $nextPageUrl ?>'>&gt;</a>

<header class="block--header post--header">
  <div class="block--headlines">
    <h1 class="headline overlay-shadow"><?= $page->title(); ?></h1>
  </div>
</header>

<main class='main'>

  <article class="content-block--below-fixed project-section" itemscope itemtype="http://schema.org/BlogPosting">
    <svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" preserveAspectRatio="none">
      <polygon points="50,0 0,50 50,50" fill="inherit" />
    </svg>     
  
    <time class="content-wrapper--narrow" itemprop="datePublished" pubdate datetime="<?= $page->date('m/d/Y')?>" title="<?= $page->date('M d, Y')?>"><?= $page->date('M d, Y')?></time>

    <div class="content-wrapper--narrow post">
    <?= kirbytext($page->text()) ?>
    </div>
  </article>
</main>


<script async="" src="//codepen.io/assets/embed/ei.js"></script>

<? snippet('footer') ?>

