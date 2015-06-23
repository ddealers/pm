path = require 'path'
gulp = require 'gulp'
less = require 'gulp-less'
bower = require 'main-bower-files'
mincss = require 'gulp-minify-css'
uglify = require 'gulp-uglify'
concat = require 'gulp-concat'
filter = require 'gulp-filter'
inject = require 'gulp-inject'

gulp.task 'compile:less', ()->
	gulp.src './assets/less/generals.less'
	.pipe(less({
		compress: true,
		paths: [ path.join(__dirname, 'less', 'includes') ]
		}) 
	)
	.pipe gulp.dest './public/css'

gulp.task 'compile:bower:js', ()->
	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.js'
	.pipe uglify()
	#.pipe concat 'vendor.min.js'
	.pipe gulp.dest './public/js'

gulp.task 'compile:bower:css', ()->
	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.css'
	.pipe mincss()
	.pipe concat 'vendor.min.css'
	.pipe gulp.dest './public/css'

gulp.task 'compile:bower:fonts', ()->
	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.eot'
	.pipe gulp.dest './public/fonts'

	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.svg'
	.pipe gulp.dest './public/fonts'

	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.ttf'
	.pipe gulp.dest './public/fonts'

	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.woff'
	.pipe gulp.dest './public/fonts'

	gulp.src bower
		paths: 
			bowerDirectory: './assets/vendor'
	.pipe filter '**/*.woff2'
	.pipe gulp.dest './public/fonts'
gulp.task 'inject', ()->
	target = gulp.src './public/index.php'
	sources = gulp.src ['./public/css/**/*.css', './public/js/**/*.js'], {read: false}
	target.pipe inject sources, {relative: true}
	.pipe gulp.dest './public'

gulp.task 'compile:bower', ['compile:bower:css', 'compile:bower:js', 'compile:bower:fonts']
gulp.task 'compile', ['compile:less','compile:bower','inject']