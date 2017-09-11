<?php

/**
 * SCSS Snippet
 * @author    Bart van de Biezen <bart@bartvandebiezen.com>
 * @link      https://github.com/bartvandebiezen/kirby-v2-scssphp
 * @return    CSS and HTML
 * @version   1.0.1
 */

use Leafo\ScssPhp\Compiler;

// Using realpath seems to work best in different situations.
//change by Jan. Using Kirby asset root instead
$scssRoot = kirby()->roots()->assets() . '/scss/';
$cssRoot = kirby()->roots()->assets() . '/css/';
$pluginRoot = kirby()->roots()->plugins() . '/scssphp/';

// Set file paths. Used for checking and updating CSS file for current template.
$template     = $page->template();
$SCSS         = $scssRoot . $template . '.scss';
$CSS          = $cssRoot . $template . '.css';
$CSSKirbyPath = $cssRoot . $template . '.css';
$CSSUrl       = kirby()->urls()->assets() . '/css/' . $template;

// Set default SCSS if there is no SCSS for current template. If template is default, skip check.
// Jan - skip this step. always out default CSS. Load template specific css seperately.
//if ($template == 'default' or !file_exists($SCSS)) {
	$SCSS         = $scssRoot . 'default.scss';
	$CSS          = $cssRoot . 'default.css';
	$CSSKirbyPath = $cssRoot . 'default.css';
	$CSSUrl       = kirby()->urls()->assets() . '/css/default.css';
//}

// For when the plugin should check if partials are changed. If any partial is newer than the main SCSS file, the main SCSS file will be 'touched'. This will trigger the compiler later on, on this server and also on another environment when synced.
if (c::get('scssNestedCheck')) {
	$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($scssRoot));
	foreach ($files as $file) {
		if (pathinfo($file, PATHINFO_EXTENSION) == "scss" && filemtime($file) > filemtime($SCSS)) {
			touch ($SCSS);
			clearstatcache();
			break;
		}
	}
}

// Get file modification times. Used for checking if update is required and as version number for caching.
$SCSSFileTime = filemtime($SCSS);
$CSSFileTime = filemtime($CSS);


// Update CSS when needed.
if (!file_exists($CSS) or $SCSSFileTime > $CSSFileTime ) {

	// Activate library.
	require_once $pluginRoot . '/scss.inc.php';
	$parser = new Compiler();

	// Setting compression provided by library.
	$parser->setFormatter('Leafo\ScssPhp\Formatter\Compressed');

	// Setting relative @import paths.
	$importPath = kirby()->roots()->assets() . '/scss';
	$parser->addImportPath($importPath);

	// Place SCSS file in buffer.
	$buffer = file_get_contents($SCSS);

	// Compile content in buffer.
	$buffer = $parser->compile($buffer);

	// Minify the CSS even further.
	require_once $pluginRoot . '/minify.php';
	$buffer = minifyCSS($buffer);

	// Update CSS file.
	file_put_contents($CSS, $buffer);
}

?>
<?php echo css( "{$CSSUrl}?version={$CSSFileTime}" ) ?>
