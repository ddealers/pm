var app = angular.module('PM5', ['ngRoute', 'ngAnimate'])
.config(function($routeProvider, $locationProvider){
	$routeProvider
	.when('/:slug', {
		templateUrl: 'templates/layout/category.html',
		controller: 'CategoryController',
		controllerAs: 'category'
	})
	.when('/:slug/:post_id', {
		templateUrl: 'templates/layout/post.html',
		controller: 'PostController',
		controllerAs: 'post'
	})
	.when('/404', {
		templateUrl: 'templates/error/404.html'
	})
	.otherwise({
		redirectTo: '/404'
	})
})
.controller('MainController', ['$scope', '$route', '$routeParams', '$location', function($scope, $route, $routeParams, $location) {
	this.templates = {
		navigation: {
			user_login: 'templates/navigation/user_login.html',
			main_menu: 'templates/navigation/main_menu.html'
		}
	}
	/*
		[	{ name: 'bitPM.html', url: './templates/bitPM.html'},
			{ name: 'blogger.html', url: './templates/blogger.html'},
			{ name: 'blogueroPM.html', url: './templates/blogueroPM.html'},
			{ name: 'editorial.html', url: './templates/editorial.html'},
			{ name: 'home.html', url: './templates/home.html'},
			{ name: 'playlist.html', url: './templates/playlist.html'},
			{ name: 'recentPost.html', url: './templates/recentPost.html'},
			{ name: 'singleArticulo.html', url: './templates/singleArticulo.html'},
			{ name: 'singleArticuloBlogeroPM.html', url: './templates/singleArticuloBlogeroPM.html'},
			{ name: 'singleArticuloBlogeroPM.html', url: './templates/singleArticuloBlogeroPM.html'},
			{ name: 'singleSpecialBitPM.html', url: './templates/singleSpecialBitPM.html'},
			{ name: 'singleVideo.html', url: './templates/singleVideo.html'}
		];
	*/
}])
.controller('CategoryController', ['$routeParams', function($routeParams){
	console.log($routeParams.slug);
}])
.controller('PostController', ['$routeParams', function($routeParams){
	console.log($routeParams.slug, $routeParams.post_id)
}]);