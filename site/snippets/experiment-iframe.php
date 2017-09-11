<?php if ($file = $page->files()->get('index.html')) : ?>
<iframe style="height:100%;width:100%;margin:0;padding:0;border:0;box-sizing: border-box;" src="<?=$file->url();?>"></iframe>
<?php endif ?>