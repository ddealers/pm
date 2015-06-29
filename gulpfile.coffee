path = require 'path'
gulp = require 'gulp'
less = require 'gulp-less'
bower = require 'main-bower-files'
livereload = require 'gulp-livereload'
mincss = require 'gulp-minify-css'
uglify = require 'gulp-uglify'
concat = require 'gulp-concat'
filter = require 'gulp-filter'
inject = require 'gulp-inject'
rev = require 'gulp-rev'
ngAnnotate = require 'gulp-ng-annotate'
sourcemaps = require 'gulp-sourcemaps'
rename = require 'gulp-rename'

gulp.task 'compile:less', ()->
	gulp.src './assets/less/generals.less'
	.pipe(less({
		compress: true,
		paths: [ path.join(__dirname, 'less', 'includes') ]
		}) 
	)
	.pipe rename 'generals.min.css'
	.pipe gulp.dest './public/css'
	
gulp.task 'compile:js', ()->
	gulp.src [
		'./assets/js/**/module.js'
		'./assets/js/**/*.js'
	]
	.pipe sourcemaps.init()
	.pipe concat 'app.min.js'
	#.pipe ngAnnotate()
	#.pipe uglify()
	.pipe sourcemaps.write()
	.pipe gulp.dest './public/js'
	
gulp.task 'compile:bower:js', ()->
	#gulp.src bower
	#	paths: 
	#		bowerDirectory: './assets/vendor'
	gulp.src [
		'./assets/vendor/jquery/dist/jquery.js'
		'./assets/vendor/angular/angular.js'
		'./assets/vendor/angular-resource/angular-resource.js'
		'./assets/vendor/angular-animate/angular-animate.js'
		'./assets/vendor/angular-bootstrap/ui-bootstrap.js'
		'./assets/vendor/angular-bootstrap/ui-bootstrap-tpls.js'
		'./assets/vendor/angular-route/angular-route.js'
	]
	.pipe filter '**/*.js'
	.pipe concat 'vendor.min.js'
	#.pipe ngAnnotate()
	#.pipe uglify()
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

gulp.task 'watch', ()->
	livereload {start: true}
	
	gulp.watch './assets/less/**/*.less', ['compile:less']
	gulp.watch './assets/js/**/*.js', ['compile:js']
	
	gulp.watch 'public/**/*.+(css|js|html|gif|ico|jpg|jpeg|png)', (event)->
    	filePath = event.path.replace(/\\/g, '/').replace(new RegExp('^(.*/)?public(/(.+))$'), '$2')
    	#livereload.changed filePath
    	livereload.reload()

gulp.task 'compile:bower', ['compile:bower:css', 'compile:bower:js', 'compile:bower:fonts']
gulp.task 'compile', ['compile:bower','compile:less','compile:js']
gulp.task 'default', ['compile','watch']