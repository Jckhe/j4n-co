<?= '<?xml version="1.0" encoding="utf-8"?>';?>
<? $ignore = array('sitemap', 'error');
// send the right header
header('Content-type: text/xml; charset="utf-8"');?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<? foreach($pages->visible()->index() as $p): ?>
	<? if(in_array($p->uri(), $ignore)) continue ?>
	<url>
		<loc>http://j4n.co<?= html($p->url()) ?></loc>
		<lastmod><?php echo $p->modified('c') ?></lastmod>
		<priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
	</url>
	<? endforeach?>  
</urlset>
