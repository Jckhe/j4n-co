<? if(!defined('KIRBY')) exit ?>

# default blueprint

title: post 
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
  
  date: 
    label:  date
    type:   date
    format: dd.mm.yy
  
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