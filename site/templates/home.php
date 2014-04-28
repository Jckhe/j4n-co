<? snippet('header') ?>
<? snippet('site_nav') ?>


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
    <div class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          manage their schedules at work,
        </span>
      </p>
      <div class="portfolio-image">
        <img class="portfolio-hover-image" src="/j4n-co/assets/images/home-skedx-overlay.jpg"/>
        <img class="portfolio-initial-image" src="/j4n-co/assets/images/home-skedx.png"/>
      </div>
    </div>

    <div class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          share ideas with their co-workers,
        </span>
      </p>
      <div class="portfolio-image">
        <img class="portfolio-hover-image" src="/j4n-co/assets/images/home-skedx-overlay.jpg"/>
        <img class="portfolio-initial-image" src="/j4n-co/assets/images/home-skedx.jpg"/>
      </div>
    </div>


    <div class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          sell art & photography books online,
        </span>
      </p>
      <div class="portfolio-image">
        <img class="portfolio-hover-image" src="/j4n-co/assets/images/home-skedx-overlay.jpg"/>
        <img class="portfolio-initial-image" src="/j4n-co/assets/images/home-skedx.jpg"/>
      </div>
    </div>

    <div class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          promote local jewelery & fashion designers,
        </span>
      </p>
      <div class="portfolio-image">
        <img class="portfolio-hover-image" src="/j4n-co/assets/images/home-skedx-overlay.jpg"/>
        <img class="portfolio-initial-image" src="/j4n-co/assets/images/home-skedx.jpg"/>
      </div>
    </div>

    <div class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          create unique photoblogs, 
        </span>
      </p>
      <div class="portfolio-image">
        <img class="portfolio-hover-image" src="/j4n-co/assets/images/home-skedx-overlay.jpg"/>
        <img class="portfolio-initial-image" src="/j4n-co/assets/images/home-skedx.jpg"/>
      </div>
    </div>


    <div id="contact-me" class="home-portfolio">
      <p class="right-headline cf">
        <span class='floating-p animated bounceInLeft'>
          like you.
        </span>
      </p>
      <?php snippet('contactform') ?>      
    </div>    
  </div>
</div>


<? snippet('footer') ?>

<script> 
$(document).ready(function(){

var didScroll = false;
 
var headlineOffsets = []
var initialOffset = $('.home-column-right-content').offset().top
var rightHeadlines = $('.right-headline')

$('.right-headline').each(function(index, element){
  headlineOffsets.push($(element).offset().top-11)
})

$(window).scroll(function(event) {
  //didScroll = true;
  scrollCallback()
});
 
/*setInterval(function() {
  if ( didScroll ) {
    didScroll = false;
    //scrollCallback()
  }
}, 250);
*/
function scrollCallback(){
  
  var currentOffset = $(window).scrollTop() + initialOffset; 
  var nearbyHeadline;
  var absoluteDiff;
  var diff; 

  for (i=0; i<headlineOffsets.length; i++){

    diff = currentOffset - headlineOffsets[i]
    
    absoluteDiff = Math.abs(diff)
    
    if (absoluteDiff < 50){
      alert(i)
      nearbyHeadline = rightHeadlines[i]
      $(nearbyHeadline).css({
        WebkitTransform: 'translateY('+diff+'px)',
        MozTransform: 'translateY('+diff+'px)',
        msTransform: 'translateY('+diff+'px)',
        transform: 'translateY('+diff+'px)'
      })
      break;
    }
  }
}

});//document.ready
</script> 
