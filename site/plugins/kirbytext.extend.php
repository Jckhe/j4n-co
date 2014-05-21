<?php
class kirbytextExtended extends kirbytext {

  function __construct($text, $markdown=true) {
    
    parent::__construct($text, $markdown);
    
    // define custom tags
    $this->addTags('fileURL');
                
  }  

  function fileURL($params) {
  	$url    = @$params['fileURL'];
    $target = self::target($params);

    return $this->url($url);
  }

}

?>