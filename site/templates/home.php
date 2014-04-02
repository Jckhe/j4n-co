<? snippet('header') ?>
<? snippet('site_nav') ?>


<div class="home-container">

  <div class="parallax-headline">
    <h1>
      Jan Drewniak
    </h1>
    <h2> 
      Interface Design <span class="amp">&</span> Development
    </h2> 
  </div> 

  <div class="parallax-bg change-opacity" data-stellar-ratio="1"></div>

  <? $data_stellar_ration = array(1.1, 2, 0.9, 1.6, 1.2); ?>
  <? $ps =$pages->find('portfolio')->children(); ?>
  <? $j = 0; ?>
  
  <? foreach($ps AS $p): ?>

    <div class="parallax-item" data-stellar-ratio="<?= $data_stellar_ration[$j] ?>">
      <a class="parallax-item-thumbnail" href="<?= $p->url() ?>">
        <div class="flipper">
          <div class="front">
          <img src="<?= $p->files()->find('icon.png')->url() ?>" style="height:100%;">
          </div>
          <div class="back">
            <?
            $videos = array(
              $p->videos()->find('movie.mp4'),
              $p->videos()->find('movie.mobile.mp4'),
              $p->videos()->find('movie.webm'),
              $p->videos()->find('movie.ogv'),
            );
            
            $videos = array_filter($videos);
            
            snippet('video', array(
              'videos' => $videos,
              'thumb'  => $p->images()->find('movie.jpg')
            )); ?>
          </div>
        </div>
      </a>
    </div>
    <? $j += 1 ?>
  <? endforeach ?>


  <div class="parallax-item home-description" data-stellar-ratio="1" style="top: 70%;">
    <div class="round-avatar"></div> 
    <p>
      Are you building a mobile or web app? Congratulations, so are millions of other people.
      If you want to make your app unique, then I'm the man you need. I'm Jan, and I make 
      apps enjoyable and memberable.     
    </p>
    <a class='large' href="mailto:jan.drewniak@gmail.com">Hire Me! <span class="small-button-text">(I'm available)</span></a>
  </div>

</div>

<script src="assets/javascripts/jquery.color.js"></script> 
<script src="assets/javascripts/scrollability.js"></script> 

<script src="assets/javascripts/stellar.js"></script> 

<script>
$(document).ready(function(){
  
  var docHeight = $(window).height()*0.5


$.stellar.positionProperty.position = {
  setTop: function($element, newTop, originalTop) {
    if ($element.hasClass('change-opacity')){
      $element.css('opacity',-1*newTop/docHeight)
    } else {
      $element.css('top', newTop);
    }
  },
  setLeft: function($element, newLeft, originalLeft) {
    $element.css('left', newLeft);
  }
}

  $.stellar({
    responsive: true,
    hideDistantElements: false,
    parallaxBackgrounds: false,
    positionProperty: 'position'
  });  
})  


</script>
<? snippet('footer') ?>
