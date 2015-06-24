angular.module('PM5')
.controller('CategoryController', ['$routeParams', function($routeParams){
	console.log($routeParams.slug);
}]);