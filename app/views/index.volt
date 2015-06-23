<!DOCTYPE html>
<html>
	<head>
		<base href="{{ baseUrl }}" />
		<meta charset="utf-8">
		{{ get_title() }}
		<link rel="shortcut icon" href="favicon.ico" sizes="256x256" />
		<!-- inject:css -->
  		<!-- endinject -->
	</head>
	<body>
		{{ content() }}
		<!-- inject:js -->
  		<!-- endinject -->
	</body>
</html>