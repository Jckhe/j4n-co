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

<? $videos = $page->videos() ?>

<? $images = $page->images() ?>
<? $gallery_images = array() ?>

<? // GALLERY IMAGES ?>
<? foreach($images AS $i): ?>
  <? if( intval($i->name()) > 0 ): ?> 
  <? array_push($gallery_images, $i) ?>
  <? endif ?> 
<? endforeach ?>


<header class="block--header">
  
  <div class="block--fixed with-video">
    <div class="overlay"></div>
    <video class="background-video" autobuffer autoplay autoloop loop poster="<?=$gallery_images[0]->url() ?>">
      <? foreach($videos AS $v): ?>
        <source src="<?=$v->url(); ?>">
        <source src="<?=$v->url(); ?>">
      <? endforeach ?>
    </video>
  </div>


  <div class="block--headlines">
    <h1 class="headline overlay-shadow"><?= $page->title(); ?></h1>
    <h2 class="subhead overlay-shadow"><?= $page->subtitle(); ?></h2>
  </div>

</header>

<a class='prevnext-nav prev' href='<?= $prevPageUrl ?>'>&lt;</a>

<a class='prevnext-nav next' href='<?= $nextPageUrl ?>'>&gt;</a>


<main class="main" role="main">
  <article class="content-block--below-fixed project-section">
    <svg class="svg-angle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" preserveAspectRatio="none">
      <polygon points="50,0 0,50 50,50" fill="inherit" />
    </svg>
  
    
    <div class='content-wrapper--narrow'>
      <?= kirbytext($page->text()) ?>
      
      <? foreach($gallery_images AS $index=>$i): ?>
          <img class='gallery-image' id='slide_<?= $index ?>' src='<?= $i -> url() ?>'/>
      <? endforeach ?> 

    </div>

  </article>
</main>
<? snippet('footer') ?>
