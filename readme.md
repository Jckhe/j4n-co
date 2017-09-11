#j4n.co

This is the repository of [j4n.co](http://j4n.co), my personal portfolio and blog website.

## Big bits
This is a Kirby CMS v2 installation. Kirby core and panel are git submodules loaded in their respective directories. All other plugins are submodules loaded into the vendor directory and symlinked to their final destinations (this is the most manageable and upgradable approach I've found so far -- for what it's worth -- Kirby is cool but doesn't have a great upgrade path). The benefit to keeping the plugins outside your sites folder is that if you want to redo the whole site next year (likely) you can throw away the sites folder and start fresh, while maintaining a bunch of up-to-date plugins (you'll have to symlink them again, but hey).

Your content is stored on dropbox. Dropbox is installed on your server and the content folder is symlinked. There's also a test-content folder on your local (git-ignored) for dev purposes.

## Little bits
All static assets (JS/CSS/images/fonts etc.) are in the assets folder. SCSS is compiled on the fly by the Kirby SCSS plugin. Remember, optimize your images before you uploading them (until you figure an automated image optimization strategy).

## Tidy bits
See the SCSS documentation for what you were thinking when you organized the styles. JS dependencies are handled by NPM, and compiled with Rollup, so go nuts with the ES6 syntax.

## Dev
You can run the site locally with PHP's built-in web-server (if you don't need .htaccess). When working on the assets folder, you can run npm start from that directory. Locally, you have a git-ignored site.php file at the root of the repo that triggers the use of the test-content folder instead of the symlinked content folder.

## Deploy
In case you get amnesia and forget this Jan (unlikely), there's a cron job on your server that does a `git pull origin master` on your server every 15 minutes (you could have a fancy gitflow branch setup, but let's not overcomplicate this).