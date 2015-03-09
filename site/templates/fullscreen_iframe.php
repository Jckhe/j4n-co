<? snippet('header') ?>

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

<a class='prevnext-nav prev active-static' href='<?= $prevPageUrl ?>'>&lt;</a>

<a class='prevnext-nav next active-static' href='<?= $nextPageUrl ?>'>&gt;</a>


<iframe class="lab-iframe"  scrolling="no" src="<?= $page->location() ?>"></iframe>

<? snippet('footer') ?>