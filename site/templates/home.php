<? snippet('header') ?>
<? snippet('site_nav') ?>

<? $portfolio_pages = $pages->findByUID('portfolio')->children()->visible(); ?> 


<div class="home-column-left">
  <div class="home-title flip-container">
    <div class="flipper animated">
      <div class="home-avatar-front flipper-front">
      </div>
      <div class="home-avatar-back flipper-back"><a class="about-link" href="/jan-drewniak">more about me</a></div>
    </div>
  </div>
  <p class="home-intro floating-p animated bounceInLeft">
    Hey there, I’m Jan. I design and build stuff for the web. 
  </p>
  <p class="left-headline  animated bounceInLeft">
    <span class="floating-p">
      In the past I’ve helped people
    </span>
  </p>
  <p class="floating-p home-how animated bounceInLeft"> 
    and I love working on new products and startups. If you're looking for someone to take your idea to the next level, then we should talk.      
    <br/>
    <br/>
    <a class="green-contact aqua" href="#contact-me">get in touch</a>
  </p>

</div>

<div class="home-column-right">
  <div class="home-column-right-content">
    
    <? foreach($portfolio_pages->visible() AS $p): ?>

      <div class="home-portfolio">
        <p class="right-headline first cf">
          <span class='floating-p animated bounceInLeft'>
            <?= $p->homepage_title() ?>
          </span>
        </p>
        <div class="portfolio-image">
          <img class="portfolio-hover-image" src="<?= $p->files()->find('home_original.jpg')->url() ?>"/>
          <img class="portfolio-initial-image" src="<?= $p->files()->find('home_preview.svg')->url() ?>"/>
        </div>
        <a class="home-work-link" href="<?= $p->url() ?>">
          Learn more about <?= $p->title() ?> &rarr;
        </a>
      </div>

    <? endforeach ?> 

    <div id="contact-me" class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          like you
        </span>
      </p>
      <div class="portfolio-image" style="display: none;">
        <!--
        <img class="portfolio-initial-image" src="/assets/images/avatar.png" style="display: none; " /> -->
      </div>
      <?php snippet('contactform') ?>      
    </div>    
  </div>
</div>


<? snippet('footer') ?>

<script> 

$(document).ready(function(){

  var nearbyHeadline;
  var diff; 
  var headlineOffsets = []
  var initialOffset = $('.home-column-right-content').offset().top
  var $rightHeadlines = $('.right-headline')
  var $portfolioImages = $('.portfolio-image')
  var $homePortfilios = $('.home-portfolio')
  var $contactMe = $('#contact-me')

  var latestKnownScrollY = 0;
  var ticking = false;

  //adjusting contact form height
  $contactMe.css({minHeight: $(window).height()-250+'px' })

  resetHeadlineOffsets();

  $(window).resize(function(){
    resetHeadlineOffsets();
  })

  $(window).scroll(onScroll)


  function resetHeadlineOffsets(){
    headlineOffsets = []
    $homePortfilios.each(function( index ){
      checkForImages($(this), $homePortfilios)
    })
  }


  function checkForImages($element, $elements){
    var index = $elements.index($element[0])

    var waitForImages = $element.find('img').length > 0 

    if (waitForImages){
      $element.find('img').load(CalculateHeadlineOffsets)
    } else {
      CalculateHeadlineOffsets()
    }
  }

  function CalculateHeadlineOffsets(){
    $homePortfilios.each(function(){
      var portfolioHeadline =  $(this).find('.right-headline')
      
      var index = $homePortfilios.index($(this)[0])

      portfolioHeadline.css({
        WebkitTransform: 'translateY(0px)',
        MozTransform: 'translateY(0px)',
        msTransform: 'translateY(0px)',
        transform: 'translateY(0px)'
      })

      var offset = portfolioHeadline.offset().top - 11
      headlineOffsets[index] = offset 
    })
  }

  
  function onScroll() {
    latestKnownScrollY = window.scrollY;
    requestTick();
  }
  
  function requestTick() {
    if(!ticking) { requestAnimationFrame(update); };
    ticking = true;
  }

  function update() {
    ticking = false;
    var currentOffset = latestKnownScrollY + initialOffset; 
    diff = 0
    nearbyHeadline = false;
    var i = headlineOffsets.length;
    while(i--){
      diff = currentOffset - headlineOffsets[i]
      if (diff < 200 && diff > -20){
        nearbyHeadline = $rightHeadlines.eq(i)
        corespondingImage = $portfolioImages.eq(i)
        break;
      }
    }
    if (nearbyHeadline){
      $rightHeadlines.removeClass('fixedHeadline')
      nearbyHeadline.addClass('fixedHeadline')      
    }
    if(corespondingImage){
      $portfolioImages.removeClass('hover')
      corespondingImage.addClass('hover')
    }
  }

});//document.ready
</script> 
