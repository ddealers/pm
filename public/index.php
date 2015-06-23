<!DOCTYPE html>
<html ng-app="PM5">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
	    <!-- inject:css -->
	    <link rel="stylesheet" href="css/vendor.min.css">
	    <link rel="stylesheet" href="css/generals.css">
	    <!-- endinject -->
	</head>
	<body id="PMCanal5" ng-controller="MainController as main">
		<header id="principalHeader">
			<section id="user-nav" ng-include="main.templates.navigation.user_login"></section>
			<nav ng-include="main.templates.navigation.main_menu"></nav>
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
		    </div>
		</section>
		<!-- inject:js -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/angular.js"></script>
		<script src="js/angular-animate.js"></script>
		<script src="js/angular-route.js"></script>
		<script src="js/app.js"></script>
		<!-- endinject -->
	</body>
</html>