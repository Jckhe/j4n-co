<? snippet('header') ?>
<? snippet('site_nav') ?>

<? $portfolio_pages = $pages->findByUID('portfolio')->children()->visible(); ?> 


<div class="home-title flip-container">
  <div class="initilal-flipper-animation">
    <div class="flipper animated">
      <div class="home-avatar-front flipper-front">
      </div>
      <div class="home-avatar-back flipper-back">
        <a class="about-link" href="/jan-drewniak">more about me</a>
      </div>
    </div>
  </div>
</div>


<div class="ribbon-wrapper">
  <span class="ribbon-end start"></span>
  <div class="ribbon">
    <h2 class="ribbon-text has_shadow">
      <a href="<?= $pages->findByTitle('home');?>">
        Creative Pixels
      </a>
    </h2>
    <h3 class="ribbon-subhead">
      for the web
    </h3>
  </div>
  <span class="ribbon-end end"></span>
</div>


<div class="home-column-left">
  <p class="floating-p home-how animated bounceInLeft"> 
    <span class="drop-cap">J</span>an Drewniak is a UI designer/developer with a passion for creating engaging interactions on the web.
    <br/>
    If you're looking for someone to take your app (wether it's mobile or web) to the next level, you should totally talk to him.      
    <br/>
    <br/>
    <a class="green-contact aqua" href="#contact-me">get in touch</a>
  </p>

  <p class="left-headline  animated bounceInLeft">
    <span class="floating-p home-portfolio-link">
      Recently, I've helped people
      <a href="#" class="subtext"></a>
    </span>
  </p>

</div>

<div class="home-column-right">
  <div class="home-column-right-content">
    
    <? foreach($portfolio_pages->visible() AS $p): ?>

      <div class="home-portfolio">
        <div class="portfolio-image">
          <a href="<?= $p->url() ?>">
            <img alt="<?= $p->homepage_title()?> &rarr;" class="portfolio-hover-image" src="<?= $p->files()->find('home_original.jpg')->url() ?>"/>
          </a>
          <img class="portfolio-initial-image" src="<?= $p->files()->find('home_preview.svg')->url() ?>"/>
        </div>
        </a>
      </div>

    <? endforeach ?> 

    <div id="contact-me" class="home-portfolio" >
      <p class="right-headline cf" >
      </p>
      <?php snippet('contactform') ?>      
      <div class="portfolio-hover-image" alt="like you"></div>
    </div>    
  </div>
</div>


<? snippet('footer') ?>

<script> 

$(document).ready(function(){


function elementInParentViewport(el, parent){
  var top = $(el).offset().top;
  var left = $(el).offset().left;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  return (
    top >= parent.offset().top &&
    left >= parent.offset().left &&
    (top + height) <= (parent.offset().top + parent.innerHeight()) &&
    (left + width) <= (parent.offset().left + parent.innerWidth())
  );

}

function elementInViewport(el) {
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;
  

  while(el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }
  

  return (
    top >= window.pageYOffset &&
    left >= window.pageXOffset &&
    (top + height) <= (window.pageYOffset + window.innerHeight) &&
    (left + width) <= (window.pageXOffset + window.innerWidth)
  );
}


  var nearbyHeadline;
  var diff; 
  var headlineOffsets = []
  var initialOffset = $('.home-column-right-content').offset().top
  var $rightHeadlines = $('.right-headline')
  var $portfolioImages = $('.portfolio-image')
  var $homePortfilios = $('.home-portfolio')
  var $contactMe = $('#contact-me')
  var leftHeadlineSubtext = $('.left-headline .subtext')
  var leftHeadlineXOffset = $('.left-headline').offset().top-11; 
  var portfolioHeight = $('.home-portfolio').height(); 
  var $portfolioInitialImages = $('.portfolio-hover-image')
  var $portfolioParent = $('.home-column-right-content')

  var elementInView = function(el){
    if (window.outerWidth < 700 ) {
      return elementInParentViewport( el, $portfolioParent )  
    } else {
      return elementInViewport( el )
    }
  }
  
  var latestKnownScrollY = 0;
  var ticking = false;

  //adjusting contact form height
  $contactMe.css({minHeight: $(window).height()-250+'px' })

  //resetHeadlineOffsets();

  $(window).resize(function(){
    //resetHeadlineOffsets();
  })

  $(window).scroll(onScroll)
  $('.home-column-right-content').scroll(onScroll)


  function checkForImages($element, $elements){
    var index = $elements.index($element[0])

    var waitForImages = $element.find('img').length > 0 

    if (waitForImages){
      $element.find('img').load(CalculateHeadlineOffsets)
    } else {
      CalculateHeadlineOffsets()
    }
  }
  


  function onScroll() {
    latestKnownScrollY = window.scrollY;
    requestTick();
  }
  
  function requestTick() {
    if(!ticking) { requestAnimationFrame(update); };
    ticking = true;
  }
  
  update()

  function update() {
    ticking = false;
    var activeImage = false; 

    var i = $portfolioInitialImages.length;
    while(i--){
      if ( elementInView( $portfolioInitialImages.eq(i)[0] ) ) {
        activeImage = $portfolioInitialImages.eq(i)
        altText = activeImage.attr('alt')
        break; 
      }
    }

    if(activeImage){
      leftHeadlineSubtext.text(altText)

      leftHeadlineSubtext.attr('href', activeImage.parents('a').attr('href'))

      $portfolioInitialImages.removeClass('hover')
      activeImage.addClass('hover')
    }
  }

});//document.ready
</script> 
