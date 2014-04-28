<? snippet('header') ?>
<? snippet('site_nav') ?>

<? $portfolio_pages = $pages->findByUID('portfolio')->children()->visible(); ?> 


<div class="home-column-left">
  <div class="home-title flip-container">
    <div class="flipper animated">
      <div class="home-avatar-front flipper-front">
      </div>
      <div class="home-avatar-back flipper-back"><a class="about-link" href="#about-me">more about me...</a></div>
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
    I love creating rich interactions for the web and experimenting with interfaces, wether it be for desktop, mobile or screens we haven't yet imagined.     </br>

    <br/>
    <button class="green-contact aqua">
      <a href="#contact-me">get in touch</a>
    </button>
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
          like you.
        </span>
      </p>
      <div class="portfolio-image" style="display: none;">
        <img class="portfolio-initial-image" src="/j4n-co/assets/images/avatar.png" style="display: none; " />
      </div>
      <?php snippet('contactform') ?>      
    </div>    
  </div>
</div>


<? snippet('footer') ?>

<script> 
$(document).ready(function(){

  var nearbyHeadline;
  var absoluteDiff;
  var diff; 
  var headlineOffsets = []
  var initialOffset = $('.home-column-right-content').offset().top
  var rightHeadlines = $('.right-headline')

  loadHeadlineOffsets();

  function loadHeadlineOffsets(){
    //reseting array
    headlineOffsets = []
    $('.portfolio-initial-image').load(function(){
      loadHeadlinesInLoop(this)
    })
    
    if ( headlineOffsets.length == 0 ){
      $('.portfolio-initial-image').each(function( index ){
        loadHeadlinesInLoop(this)
      })
    }

    function loadHeadlinesInLoop(element){
      var index = $(element).index('.portfolio-initial-image')
      var correspondingHeadline =  $(element).parent().prev('.right-headline')
      
      correspondingHeadline.css({
        WebkitTransform: 'translateY(0px)',
        MozTransform: 'translateY(0px)',
        msTransform: 'translateY(0px)',
        transform: 'translateY(0px)'
      })

      var offset = correspondingHeadline.offset().top - 11
      headlineOffsets[index] = offset 
    }
  }


  $(window).resize(function(){
    loadHeadlineOffsets();
  })

  $(window).scroll(function(event) {
    
    var currentOffset = $(window).scrollTop() + initialOffset; 
    
    console.log(headlineOffsets)

    for (i=0; i<headlineOffsets.length; i++){

      diff = currentOffset - headlineOffsets[i]
      
      absoluteDiff = Math.abs(diff)
      
      if (diff < 200 && diff > -1){
        nearbyHeadline = rightHeadlines[i]
        break;
      } else {
        diff = 0
        nearbyHeadline = false
      }
    }
    //alternative approach
    //rightHeadlines.removeClass('fixedHeadline')
    //$(nearbyHeadline).addClass('fixedHeadline')
    
    $(nearbyHeadline).css({
      WebkitTransform: 'translateY('+diff+'px)',
      MozTransform: 'translateY('+diff+'px)',
      msTransform: 'translateY('+diff+'px)',
      transform: 'translateY('+diff+'px)'
    })
    

  }); //window.scroll


});//document.ready
</script> 
