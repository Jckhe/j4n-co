<? if(!defined('KIRBY')) exit ?>

title: Page 
pages: true 
files: true
fields: 
  title: 
    label: Title
    type:  text
  description:
    label: Description
    type:  text
  keywords:
    label: Keywords
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
filefields: 
  description: 
    label: Description
    type:  text