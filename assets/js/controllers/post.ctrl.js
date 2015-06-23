angular.module('PM5')
.controller('PostController', ['$routeParams', function($routeParams){
	console.log($routeParams.slug, $routeParams.post_id)
}]);