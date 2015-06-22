var app = angular.module('PM5', []);
app.run().controller('mainController', ['$scope', function($scope) {
	this.templates = {
		navigation: {
			user_login: './templates/navigation/user_login.html',
			main_menu: './templates/nagivation/main_menu.html'
		}
	}
	/*
		[	{ name: 'bitPM.html', url: './templates/bitPM.html'},
			{ name: 'blogger.html', url: './templates/blogger.html'},
			{ name: 'blogueroPM.html', url: './templates/blogueroPM.html'},
			{ name: 'editorial.html', url: './templates/editorial.html'},
			{ name: 'home.html', url: './templates/home.html'},
			{ name: 'playlist.html', url: './templates/playlist.html'},
			{ name: 'recentPost.html', url: './templates/recentPost.html'},
			{ name: 'singleArticulo.html', url: './templates/singleArticulo.html'},
			{ name: 'singleArticuloBlogeroPM.html', url: './templates/singleArticuloBlogeroPM.html'},
			{ name: 'singleArticuloBlogeroPM.html', url: './templates/singleArticuloBlogeroPM.html'},
			{ name: 'singleSpecialBitPM.html', url: './templates/singleSpecialBitPM.html'},
			{ name: 'singleVideo.html', url: './templates/singleVideo.html'}
		];
	*/
}]);