angular.module('PM5')
.controller('MainController', ['$scope', '$route', '$routeParams', '$location', function($scope, $route, $routeParams, $location) {
	this.templates = {
		insiders: {
			login_bar: '/templates/insiders/login_bar.html'
		},
		navigation: {
			main_menu: '/templates/navigation/main_menu.html'
		},
		sections: {
			promo: '/templates/sections/promo.html'
		},
		components: {
			promo_slider: '/templates/components/promo_slider.html',
			twitter_box: '/templates/components/twitter_box.html'
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
}])