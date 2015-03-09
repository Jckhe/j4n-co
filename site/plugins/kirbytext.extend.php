<?php
kirbytext::$tags['fileURL'] = array(
  'html' => function($tag) {
    
    $filename = $tag->attr('fileURL');
    $file = $tag->file($filename);

    return $file->url();
  }

);

?>