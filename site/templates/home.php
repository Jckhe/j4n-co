<? snippet('header') ?>
<? snippet('site_nav') ?>


<div class="home-container">

<h1 class="parallax-headline">
My name is Jan
</h1>
<p>
	I design & develop digital goods and services. 
</p>
</div>

<div class="parallax">

  <div class="parallax-bg change-opacity" data-stellar-ratio="1"></div>

  <div class="parallax-item parallax-headline" data-stellar-ratio="1" style="top: 89%;">
    <h1 style="color:white;">I make things like this</h1>
  </div>
  <? $data_stellar_ration = array(1.5, 2, 1.2, 1.6, 1.7); ?>
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
            <h3>more</h3>
          </div>
        </div>
      </a>
    </div>
    <? $j += 1 ?>
  <? endforeach ?>


  <div class="parallax-item parallax-headline" data-stellar-ratio="1" style="top: 200%;">
    <h1 style="color:white;">Which is to say, I'm an interface designer.</h1>
    <p style="color:white;font-size: 18px; line-height: 1.6em;width: 50%; margin: 0 auto; letter-spacing: 1px;">
      I specialize in web application development.<br/>
      So If you're looking for someone who can <em>not only</em> <br/>
      design an engaging interface, but <em>also</em> bring it<br/>
      to life in code,
      then I'm the man you're looking for.  
    </p>
    <a class='large' href="mailto:jan.drewniak@gmail.com">Let's Chat</a>
  </div>

</div>


<script src="assets/javascripts/jquery.color.js"></script> 
<script src="assets/javascripts/scrollability.js"></script> 

<script src="assets/javascripts/stellar.js"></script> 

<style>
.parallax-bg.change-opacity{
background-color: #333;
z-index: 0;
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%; 
}
</style>
<script>
$(document).ready(function(){

$.stellar.positionProperty.position = {
  setTop: function($element, newTop, originalTop) {
    
    if ($element.hasClass('change-opacity')){
      console.log(-1*newTop/1000)
      $element.css('opacity',-1*newTop/1000)
    } else {
      $element.css('top', newTop);
    }
  },
  setLeft: function($element, newLeft, originalLeft) {
    $element.css('left', newLeft);
  }
}

  $.stellar({
    responsive: false,
    hideDistantElements: false,
    parallaxBackgrounds: false,
    positionProperty: 'position'
  });  

/* active state
  $('.parallax-item').not('.parallax-headline').click(function(){
    
    $('.parallax-item').not($(this)).removeClass('active')

    if (!$(this).is('.active') ){
      $(this).data('left', $(this).css('left')) 
      $(this).data('top', $(this).css('top')) 
    }

    $(this).toggleClass('active')
    
    if ($(this).is('.active') ){
      $(this).animate({left: '10%', top: '10%'})
    } else {
      $(this).animate({left: $(this).data('left'), top: $(this).data('top')})
    }
  })
END active state */
})  


</script>
<? snippet('footer') ?>