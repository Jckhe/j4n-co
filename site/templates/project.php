<? snippet('header') ?>
<? snippet('site_nav') ?>

<? $images = $page->images() ?>
<? $gallery_images = array() ?>

<? // GALLERY IMAGES ?>
<? foreach($images AS $i): ?>
  <? if( intval($i->name()) > 0 ): ?> 
  <? array_push($gallery_images, $i) ?>
  <? endif ?> 
<? endforeach ?>

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

<section class='main projects'>
  <article>
    <div class='project_gallery active'>
      <? foreach($gallery_images AS $index=>$i): ?>
      <div class='gallery_operator' id='gallery_<?= $index ?>'>
      </div>
      <? endforeach ?> 

      <? foreach($gallery_images AS $index=>$i): ?>
      <figure class='project_gallery_item'>
        <div class='scroll_wrapper'>
          <img class='gallery_large' id='slide_<?= $index ?>' src='<?= $i -> url() ?>'/>
        </div>
        <figcaption></figcaption>
      </figure>
      <? endforeach ?> 
      
      <div class='project_gallery_nav pixel_font has_top_shadow'>
      <? foreach($gallery_images AS $index=>$i): ?>
        <a class='gallery_thumb' href='#gallery_<?= $index ?>' style='background-image:url(<?= $i -> url() ?>);'></a>
      <? endforeach ?>
      </div>
      
    </div>

    <div class='article_content white_bg has_shadow'>
      <div class='centered_measure with_bottom_margin'>
        <h1 class='text_shadow project_title'>
          <?= $page->title() ?>
        </h1>
        <?= kirbytext($page->text()) ?>
      </div>
      <div class='nav_flipper left'>
        <div class='previous'>
          <a class='pixel_font' href='<?= $prevPageUrl ?>'>
            <
          </a>
        </div>
      </div>
      <div class='nav_flipper right'>
        <div class='next'>
          <a class='pixel_font' href='<?= $nextPageUrl ?>'>
            >
          </a>
        </div>
      </div>
      <div class='clear'></div>
    </div>
  </article>
</section>
<? snippet('footer') ?>
