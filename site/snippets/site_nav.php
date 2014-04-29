<!--<input class="hidden_input" type="checkbox" id="expand_me" /> -->

<header class='top_bar dark_grey' itemscope itemtype='http://schema.org/WPHeader'>

  <nav class='sitenav' itemscope itemtype='http://schema.org/SiteNavigationElement'>
    <ul>
    <? $color_i=0; ?>
    <? $colors = array('yellow', 'aqua', 'redish', 'light_green'); ?>
    <? foreach($pages->visible() AS $p): ?>
      
      <? if ($p->title() == 'About Me'): ?> 
        <? continue; ?> 
      <? endif ?> 
      
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

            <? foreach($p->children()->visible()->limit($limit) AS $c): ?>
            <? if ($p->title() == 'blog'): ?> 
              <a href="<?= $c->url()?>" class="thumbnail_title white_pixel_font">
                <?= $c->title() ?>
              </a>
            <? else: ?>
            <span itemprop='child' itemscope itemtype='http://data-vocabulary.org/Breadcrumb' class="dropdown_block">
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
      <!--
      <li class="me section">
        <label for="expand_me" class="my_pixelated_face"></label>
        <label for="expand_me" class="my_face"></label>
      </li>
      -->
    </ul>


  </nav>        
  
  <!--
  
  <div class="expanded_bar"></div>

  <div class="expanded_content">
    <h1 class="white_text">Hi there, I'm Jan.</h1>
    <p class="white_text">
    I'm a designer/developer — let's pause on that for a second — You might be thinking "What? artsy people don't code" but the computer has always been my canvas. 
    I enjoy <a href="<?= $pages->find("lab")->url() ?>">experimenting</a> with HTML/CSS/JS and making engaging <a href="<?= $pages->find("portfolio")->url() ?>">web-things</a> (sites/apps...whatever).
    </p>
  </div>
-->
  <a class='tagline iblock' href='<?= $pages->find("home")->url() ?>'>
    <h1 itemprop='headline'>
      Jan Drewniak | <span itemprop="description">Art + Code for fun and profit</span>
    </h1>
  </a>
  
  
   
  <a class="icon-social github" target="_BLANK" href="https://github.com/j4n-co">
    github
  </a>
  <a class="icon-social linkedin" target="_BLANK" href="http://ca.linkedin.com/in/jandrewniak">
    linkedin
  </a>
  <a class="icon-social facebook" target="_BLANK" href="https://www.facebook.com/J4N.co">
    facebook
  </a>
  <a class="icon-social twitter" target="_BLANK" href="https://twitter.com/j4n_co">
    twitter
  </a> 

</header>
