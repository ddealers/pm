<!DOCTYPE html>
<html ng-app="PM5">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <title>PM Canal 5* - {{ title }}</title>
	    <meta name="description" content="PM Canal 5">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- inject:css -->
	    <link rel="stylesheet" href="/css/vendor.min.css">
	    <link rel="stylesheet" href="/css/generals.min.css">
	    <!-- endinject -->
	</head>
	<body id="PMCanal5" ng-controller="MainController as main">
		<header id="principalHeader">
			<div id="user-bar" ng-controller="LoginBarController as login" ng-include="main.templates.insiders.login_bar"></div>
			<nav class="navbar-collapse collapse nopadding" ng-include="main.templates.navigation.main_menu"></nav>
			<div class="breadcrumb"></div>
			<div id="promoPM" ng-include="main.templates.sections.promo"></div>
		</header>
		<section id="pmDesplegable">
			<div ng-include="main.templates.sidebar.banner"></div>
		</section>
		<section>
			<div></div>
		</section>
		<section id="master">
			<div id="container">
		    	<section id="content">
		            <ng-view></ng-view>
		        </section>
		        <div ng-include="main.templates.components.promo_slider"></div>
			    <div id="twitterBox" ng-include="main.templates.components.twitter_box"></div>
		    </div>
		</section>
		<!-- inject:js -->
		<script src="/js/vendor.min.js"></script>
		<script src="/js/app.min.js"></script>
		<!-- endinject -->
	</body>
</html>