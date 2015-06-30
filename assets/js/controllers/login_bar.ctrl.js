angular.module('PM5')
.controller('LoginBarController', ['$scope', '$modal', function($scope, $modal){
	this.open = function(){
		var modalInstance = $modal.open({
			templateUrl: './templates/modals/box.html',
			controller: 'ModalInstanceController',
			controllerAs: 'modal'
		})
	}
}]);