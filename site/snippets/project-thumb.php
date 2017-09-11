<?php
$url = $project->url();
if ( !$project->thumbnail()->empty() ) {
	$thumbnail = $project->image( $project->thumbnail() );
	$thumbUrl = thumb( $thumbnail, ['width' => 600, 'crop' => false] )->url();
} else {
	$thumbUrl = "";
}
?>
<a class="project-thumb" href="<?= $url ?>">
	<?= $project->thumbnailCustom() ?>
</a>