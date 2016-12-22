<!doctype html>
<html ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('page_title')</title>

        <!-- Bootstrap -->
        <link href="/css/web.css" rel="stylesheet">
	<script type="text/javascript" src="js/angular/app/lib/angular.js"></script>
	<script type="text/javascript" src="js/angular/app/app.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/MainController.js"></script>

        <![endif]-->
    </head>
    <body>
        @yield('page_content')
    </body>
</html>