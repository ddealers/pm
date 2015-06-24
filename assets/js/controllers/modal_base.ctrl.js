angular.module('PM5')
.controller('ModalBaseController', ['$modalInstance', function($scope, $modalInstance){
	this.ok = function(){
		$modalInstance.close();
	}
	this.cancel = function(){
		$modalInstance.dissmiss('cancel');
	}
}]);