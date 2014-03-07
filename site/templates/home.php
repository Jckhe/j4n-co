<? snippet('header') ?>
<? snippet('site_nav') ?>

<div class="home-container">
<h1>
My name is Jan
</h1>
<p>
	I design & develop digital goods and services. 
</p>
</div>

<div class="parallax">

  <div class="parallax-item parallax-headline" data-stellar-ratio="1" style="top: 95%;">
    <h1>I make things like this</h1>
  </div>

  <div class="parallax-item" data-stellar-ratio="1.5">
    <div class="parallax-item-thumbnail">
        <div class="flipper">
          <div class="front">
            <!-- front content -->
          </div>
          <div class="back">
            <!-- back content -->
          </div>
        </div>
    </div>
    <div class="parallax-item-description">
      <p>2. this is some stuff I've written to describe what I do</p>
    </div>
  </div>
  
  <div class="parallax-item" data-stellar-ratio="2">
    <div class="parallax-item-thumbnail">
      <div class="flipper">
        <div class="front">
          <!-- front content -->
        </div>
        <div class="back">
          <!-- back content -->
        </div>
      </div>
    </div>
    <div class="parallax-item-description">
      <p>3. this is some stuff I've written to describe what I do</p>
    </div>
  </div>

  <div class="parallax-item" data-stellar-ratio="2">
    <div class="parallax-item-thumbnail">
      <div class="flipper">
        <div class="front">
          <!-- front content -->
        </div>
        <div class="back">
          <!-- back content -->
        </div>
      </div>
    </div>
    <div class="parallax-item-description">
      <p>4. this is some stuff I've written to describe what I do</p>
    </div>
  </div>

  <div class="parallax-item" data-stellar-ratio="1.5">
    <div class="parallax-item-thumbnail">
      <div class="flipper">
        <div class="front">
          <!-- front content -->
        </div>
        <div class="back">
          <!-- back content -->
        </div>
      </div>
    </div>
    <div class="parallax-item-description">
      <p>5. this is some stuff I've written to describe what I do</p>
    </div>
  </div>

  <div class="parallax-item" data-stellar-ratio="2.5">
    <div class="parallax-item-thumbnail">
      <div class="flipper">
        <div class="front">
          <!-- front content -->
        </div>
        <div class="back">
          <!-- back content -->
        </div>
      </div>
    </div>
    <div class="parallax-item-description">
      <p>6. this is some stuff I've written to describe what I do</p>
    </div>
  </div>

</div>

<div class="parallax">
  <div class="parallax-item parallax-headline" data-stellar-ratio="1" style="top: 175%;">
    <h1>using tools like this</h1>
  </div>
</div>

<script src="assets/javascripts/stellar.js"></script> 

<script>
$(document).ready(function(){
  
  $.stellar({
    responsive: true,
    hideDistantElements: true,
    parallaxBackgrounds: false,
  });    
  
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

})


</script>
<? snippet('footer') ?>