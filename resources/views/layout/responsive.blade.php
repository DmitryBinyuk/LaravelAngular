<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('page_title')</title>

        <!-- Bootstrap -->
        <link href="/css/web.css" rel="stylesheet">

	<script type="text/javascript" src="js/angular/app/app.js"></script>
        <script type="text/javascript" src="js/angular/app/lib/angular.js"></script>

        <![endif]-->
    </head>
    <body ng-app="app">
        @yield('page_content')
    </body>
    <script>
//    var app = angular.module('app', []);

    </script>
</html>