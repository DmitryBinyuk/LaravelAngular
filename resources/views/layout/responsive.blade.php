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
	<link href="/css/main.css" rel="stylesheet">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="js/angular/app/lib/angular.js"></script>
	<script type="text/javascript" src="js/angular/app/lib/angular-route.js"></script>
	<script type="text/javascript" src="js/angular/app/lib/dirPagination.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--  JWT  -->
	<script src="//unpkg.com/angular-ui-router/release/angular-ui-router.min.js"></script>
	<script type="text/javascript" src="js/angular/app/lib/satellizer.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.6/ngStorage.min.js"></script>
	<!--  JWT  -->

	<script type="text/javascript" src="js/angular/app/app.js"></script>
	<script type="text/javascript" src="js/angular/app/services/sessionService.js"></script>
	<script type="text/javascript" src="js/angular/app/services/commentService.js"></script>


	<script type="text/javascript" src="js/angular/app/controllers/MainController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/TemplateController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/PhoneListController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/PhoneDetailController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/AuthController.js"></script>

        <![endif]-->
    </head>
    <body>
	<div class="wrapper">
	<div class="main">
	    <div class="header">
		<ul>
		    <li><a href="#phones">All phones</a></li>
		    <li><a href="#news">News</a></li>
		    <li><a href="#news">News</a></li>
		    <li class="logged_as_block" ng-if="[[name]] != undefined"><p>Logged as: [[currentUserName]]</p></li>
		    <input ng-model="phone_search" class="header_search" name="phone_search" placeholder="Search">
		</ul>
	    </div>
    <!--[[phone_search]]-->
	    <div class="container">
		<div ui-view></div>
	    </div>
		@yield('page_content')
	</div>
	    <div id="footer">
	    &copy; CHISW developed by Dmitry
	    </div>
	</div>
    </body>
</html>