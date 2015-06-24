angular.module('PM5')
.controller('LoginBarController', ['$modal', function($scope, $modal){
	console.log($modal);
	this.open = function(){
		var modalInstance = $modal.open({
			//templateUrl: './templates/modals/box.html',
			//controller: 'ModalBaseController',
			//controllerAs: 'modal'
		})
	}
}]);