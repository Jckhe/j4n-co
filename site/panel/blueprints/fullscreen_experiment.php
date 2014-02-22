<? if(!defined('KIRBY')) exit ?>

title: Fullscreen Experiment 
pages: true
files: true

fields:

  title: 
    label: Title
    type:  text

  text: 
    label: Text
    type:  textarea
    size:  large

  custom_css: 
    label: Custom CSS
    type:  textarea
    size:  large
  
  custom_js: 
    label: Custom JS
    type:  textarea
    size:  large

  display_on_home_page: 
    label: show on home page? 
    type:  checkbox
    default: off
    
filefields: 
  description: 
    label: Description
    type:  text