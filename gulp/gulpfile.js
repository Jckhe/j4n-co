var gulp = require("gulp"),//http://gulpjs.com/
	util = require("gulp-util"),//https://github.com/gulpjs/gulp-util
	sass = require("gulp-sass"),//https://www.npmjs.org/package/gulp-sass
	autoprefixer = require('gulp-autoprefixer'),//https://www.npmjs.org/package/gulp-autoprefixer
	minifycss = require('gulp-minify-css'),//https://www.npmjs.org/package/gulp-minify-css
	rename = require('gulp-rename'),//https://www.npmjs.org/package/gulp-rename
	log = util.log, 
	source = "../assets/scss/**/*.scss",
	jsSource = "../assets/js/dev/*.js",
	destination = "../assets/css/",
	sourcemaps = require('gulp-sourcemaps'),
	livereload = require('gulp-livereload'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat');


gulp.task("sass", function(){ 
	log("Generate CSS files " + (new Date()).toString());
    gulp.src(source)
		.pipe(sass({ style: 'expanded' }))
		.pipe(sourcemaps.init())
		.pipe(autoprefixer("last 3 version","safari 5", "ie 8", "ie 9"))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(destination))
	    .pipe(livereload());
	log("Finished writing file to"+destination);
});


gulp.task('scripts', function() {
  log("Contatenating scripts  " + (new Date()).toString());
  
  gulp.src(['../assets/js/vendor/*.js',jsSource])
    .pipe(concat('all.min.js'))
    .pipe(gulp.dest('../assets/js/'))
   	.pipe(livereload());
});


gulp.task("watch", function(){
	log("Watching scss files for modifications");
	gulp.watch(source, ["sass"]);
	gulp.watch(jsSource, ["scripts"]);
});
