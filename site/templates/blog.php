<?php snippet('header') ?>
<?php snippet('site_nav') ?>

<section class="main has_shadow">
  <article class="centered_measure with_top_margin with_bottom_margin">

  <h1><?= html($page->title()) ?></h1>
  <?= kirbytext($page->text()) ?>
  
  <? $posts = $page->children()->visible()->sortBy('date', 'desc') ?>
  
  <? $grouped_posts = array() ?> 
  
  <?foreach ($posts as $p) {
    
    $year = $p->date('Y');
    $month = $p->date('F');
    $post = $p;

    if ( !isset($year, $grouped_posts[$year]) ) {
      $grouped_posts[$year] = array() ;
    } 

    if ( !isset($month, $grouped_posts[$year][$month]) ) {
      $grouped_posts[$year][$month] = array() ;
    } 

    if ( !in_array($post, $grouped_posts[$year][$month]) ) {
      $grouped_posts[$year][$month][] = $post;
    } 

  }; ?>


  <? foreach(array_keys($grouped_posts) as $year): ?>
    <ul class='year_list'>
      <li class='year_item'>
        <div class='dotted_underline redish_text'>
        <?= $year ?>
        </div>
        <ul class='month_list'>
        <? foreach(array_keys($grouped_posts[$year]) as $month): ?>
        <li class='month_item'>
          <strong>
            <?= $month ?>
          </strong>
          <ul class='article_list'>
          <? foreach($grouped_posts[$year][$month] as $post): ?>
              <li class='article_item'>
                  <a href="<?= $post->url() ?>">
                  <?= $post->title() ?></a>
              </li>
          <? endforeach ?>
          </ul>
        </li>
        <? endforeach ?>
        </ul>
      </li>
    </ul>  
  <? endforeach ?>

  </article>
</section>

<?php snippet('footer') ?>