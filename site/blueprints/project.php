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
  hero:
      label: Hero image
      type: image
  text:
    label: Text
    type:  textarea
  thumbnail:
    label: thumbnail
    type:  image
  thumbnailCustom:
    label: custom thumbnail
    type:  textarea