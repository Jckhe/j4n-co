<?php
$url = $experiment->url();
if ( !$experiment->thumbnail()->empty() ) {
	$thumbnail = $experiment->image( $experiment->thumbnail() );
	$thumbUrl = thumb( $thumbnail, ['width' => 300, 'crop' => true] )->url();
} else {
	$thumbUrl = "";
}
?>

<a class="<?= $site->page( $experiment )->isOpen() ? 'experiment-item--active' : '' ;?> experiment-item" href="<?= $url ?>" style="background-image: url(<?= $thumbUrl ?>);"></a>