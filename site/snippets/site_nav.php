
<header class='top_bar dark_grey' itemscope itemtype='http://schema.org/WPHeader'>
  <nav class='sitenav' itemscope itemtype='http://schema.org/SiteNavigationElement'>
    <ul>
    <? $color_i=0; ?>
    <? $colors = array('yellow', 'aqua', 'redish', 'light_green'); ?>
    <? foreach($pages->visible() AS $p): ?>
      <li alt='<?= $p->title() ?>' class="<?= ($p->isOpen()) ? ' current_section '.$p->title() : $p->title()?> <?= $colors[$color_i] ?> section" itemscope itemtype='http://data-vocabulary.org/Breadcrumb'>
        <a class='index_link' href='<?= $p->url() ?>' itemprop='url'>
          <span itemprop='title'><?= $p->title() ?></span>
        </a>
        <div class='dropdown'>
          <h2 class='small_heading white_pixel_font'>
            <?= $p->title() ?>
          </h2>
          <? if ($p->title() == 'blog'): ?>
          <? $limit = 5 ?>
          <? else: ?>
          <? $limit = 100 ?>
          <? endif ?>
          
          <? if ($p->title() == 'About Me'): ?> 
            <p class="about_me white_pixel_font">
              <img id="my_face_avatar" src="<?= $p->files()->first()->url() ?>" />
              <?= $p->description() ?>
            </p>
          <? endif ?>
            <? foreach($p->children()->visible()->limit($limit) AS $c): ?>
            <? if ($p->title() == 'blog'): ?> 
              <a href="<?= $c->url()?>" class="thumbnail_title white_pixel_font">
                <?= $c->title() ?>
              </a>
            <? else: ?>
            <span itemprop='child' itemscope itemtype='http://data-vocabulary.org/Breadcrumb'>
              <a class='current_page thumbnail' href='<?= $c->url() ?>' itemprop='url'>
                <img src='<?= $c->files()->find('icon.png')->url() ?>'/>
                <span class='thumbnail_title white_pixel_font' itemprop='title'>
                  <?= $c->title() ?>
                </span>
              </a>
            </span>
            <? endif ?> 
            <? endforeach ?>
          </h2>
        </div>
      </li>
    <? $color_i = min($color_i+1, count($colors)-1 ); ; ?>
    <? endforeach ?>
    </ul>
  </nav>

  <a class='tagline iblock' href='<?= $site->url()?>'>
    <h1 itemprop='headline'>
      Jan Drewniak | <span itemprop="description">Art + Code for fun and profit</span>
    </h1>
  </a>
  
</header>
