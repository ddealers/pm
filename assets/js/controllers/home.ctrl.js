angular.module('PM5')
.controller('HomeController', ['$scope','$routeParams','Home', function($scope, $routeParams, Home){
	Home.index().$promise.then(function(q){
		console.log(q);
	}, function(q){
		console.log(q);
	});
}]);