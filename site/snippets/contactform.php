<?php

$form = new contactform(array(
  'to'       => 'Jan <jan.drewniak@gmail.com>',
  'from'     => 'j4n.co Contact Form <contact-form@j4n.co>',
  'subject'  => 'j4n.co Contact Form ',
  'goto'     => $page->url() . '/status:thank-you#contact-me'
));

?>
<section id="contactform">

  <?php if(param('status') == 'thank-you'): ?>


  <h1>Thanks for getting in touch!</h1>
  <p class="contactform-text" style="margin-bottom: 200px;">
    <strong>
      I'll respond to your email within 24 hours.
      </strong>
  </p>
  
  <?php else: ?>

  <h1 style="margin-bottom: 1em; ">Contact Me</h1>
  
  <form action="#contactform" method="post">
    
      <?php if($form->isError('send')): ?>
      <p class="contactform-alert">
        <strong class="error">
          The email could not be sent. Please try again later.
        </strong>
      </p>
      <?php elseif($form->isError()): ?>
      <p class="contactform-alert">
        <strong class="error"> 
          The form could not be submitted. Please fill in all fields correctly.
        </strong>
      </p>
      <?php endif ?>
  
      <div class="contactform-field-half">
        <label class="contactform-label" for="contactform-name">Your Name 
        </label>
        <?php if($form->isError('name')): ?>
          <small class="error">Please enter a name</small>
        <?php endif ?>
        <input class="contactform-input" type="text" id="contactform-name" name="name" placeholder="your name" value="<?php echo $form->htmlValue('name') ?>" />
      </div>
  
      <div class="contactform-field-half">
        <label class="contactform-label" for="contactform-email">
        Your Email address 
        </label>
        <?php if($form->isError('email')): ?>
          <small class="error">Please enter a valid email address</small>
        <?php endif ?>
        <input class="contactform-input" type="text" id="contactform-email" name="email" placeholder="your email" value="<?php echo $form->htmlValue('email') ?>" />
      </div>
  
      <div class="contactform-field">
        <label class="contactform-label" for="contactform-text">Message 
        </label>
        <?php if($form->isError('text')): ?>
          <small class="error">Please enter your text</small>
        <?php endif ?>
        <textarea class="contactform-input" name="text" id="contactform-text"><?php echo $form->htmlValue('text') ?></textarea>
      </div>

      <input class="contactform-button light_green" type="submit" name="submit" value="Send" />    
  </form>
  
  <?php endif ?>

</section>