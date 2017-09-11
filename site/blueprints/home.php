<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: true
fields:
  title:
    label: Title
    type:  text
  headline:
    label: Headline
    type: text
  subhead:
    label: subhead
    type: text
  text:
    label: Text
    type:  textarea
    size:  large
  footer:
    label: footer
    type: textarea
    size: large
  tools:
    label: Tools
    type: tags
  toolchain:
    label: Toolchain
    type: tags
  frameworks:
    label: Frameworks
    type: tags