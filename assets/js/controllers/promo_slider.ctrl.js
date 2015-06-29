angular.module('PM5')
.controller('PromoSliderController', ['$scope', function($scope){
	this.interval = 6000;
	this.slides = [
	{image: '/images/slider/01.jpg'},
	{image: '/images/slider/02.jpg'},
	{image: '/images/slider/03.jpg'},
	{image: '/images/slider/04.jpg'},
	{image: '/images/slider/05.jpg'}
	];
}]);