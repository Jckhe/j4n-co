<?php
$kirby->set('route', array(
  'pattern' => array('/lab/(:all)/src/index.html'),
  'action' => function ($path) {
	echo "poop";
  }
  ));