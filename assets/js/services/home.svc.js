angular.module('PM5')
.factory('Home',['$resource', function($resource){
	return $resource('api/posts',{}, {
		index:{
			method:"GET",
			isArray: true
		}
	});
}]);