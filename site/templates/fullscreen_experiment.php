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

    
<?= $page->text() ?>

<? snippet('footer') ?>