angular.module('PM5')
.controller('ModalInstanceController', ['$scope', '$modalInstance', function($scope, $modalInstance){
	this.ok = function(){
		$modalInstance.close('close');
	}
	this.cancel = function(){
		$modalInstance.dismiss('cancel');
	}
}]);