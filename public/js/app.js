var app = angular.module('PM5', []);
app.run().controller('mainController', ['$scope', function($scope) {
	$scope.templates =
		[	{ name: 'bitPM.html', url: 'bitPM.html'},
			{ name: 'blogger.html', url: 'blogger.html'},
			{ name: 'blogueroPM.html', url: 'blogueroPM.html'},
			{ name: 'editorial.html', url: 'editorial.html'},
			{ name: 'home.html', url: 'home.html'},
			{ name: 'playlist.html', url: 'playlist.html'},
			{ name: 'recentPost.html', url: 'recentPost.html'},
			{ name: 'singleArticulo.html', url: 'singleArticulo.html'},
			{ name: 'singleArticuloBlogeroPM.html', url: 'singleArticuloBlogeroPM.html'},
			{ name: 'singleArticuloBlogeroPM.html', url: 'singleArticuloBlogeroPM.html'},
			{ name: 'singleSpecialBitPM.html', url: 'singleSpecialBitPM.html'},
			{ name: 'singleVideo.html', url: 'singleVideo.html'}
		];
	$scope.templates = $scope.templates[0];
}]);