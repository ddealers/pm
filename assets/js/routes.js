angular.module('PM5')
.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
	$routeProvider
	.when('/:slug', {
		templateUrl: '/templates/layout/category.html',
		controller: 'CategoryController',
		controllerAs: 'category'
	})
	.when('/:slug/:post_id', {
		templateUrl: '/templates/layout/post.html',
		controller: 'PostController',
		controllerAs: 'post'
	})
	.when('/404', {
		templateUrl: '/templates/error/404.html'
	})
}]);