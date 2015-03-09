<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
  subtitle:
      label: Subtitle
      type:  text
  year:
    label: Year
    type:  text
  text:
    label: Text
    type:  textarea
  tags:
    label: Tags
    type:  tags
  showcase:
    label: Display in showcase? 
    type: checkbox
  showcase_description: 
    label: showcase description
    type: text