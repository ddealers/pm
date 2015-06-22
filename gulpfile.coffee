path = require 'path'
gulp = require 'gulp'
less = require 'gulp-less'
mincss = require 'gulp-minify-css'

gulp.task 'compile:less', ()->
	gulp.src './assets/less/generals.less'
	.pipe(less({
		paths: [ path.join(__dirname, 'less', 'includes') ]
		}) 
	)
	.pipe mincss {compatibility: 'ie8'}
	.pipe gulp.dest './public/css'

gulp.task 'compile:vendor', ()->
	console.log 'vendor'
		
###
gulp.task('default', function() {
  console.log('gulp rifa');
});
###