<!doctype html>
<html ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page_title')</title>

        <!-- Bootstrap -->
        <link href="/css/web.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
	<link href="/css/bootstrap.min.css" rel="stylesheet">

	<script type="text/javascript" src="js/angular/app/lib/angular.js"></script>
	<script type="text/javascript" src="js/angular/app/lib/angular-route.js"></script>
	<script type="text/javascript" src="js/angular/app/lib/dirPagination.js"></script>
	<script type="text/javascript" src="js/angular/app/lib/angular-animate.js"></script>

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
	<script type="text/javascript" src="js/angular/app/services/profileService.js"></script>


	<script type="text/javascript" src="js/angular/app/controllers/MainController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/PhoneListController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/PhoneDetailController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/ProfileController.js"></script>
	<script type="text/javascript" src="js/angular/app/controllers/AuthController.js"></script>

        <![endif]-->
    </head>
    <body>
    <div class="wrapper">
    <div class="main">
	<div class="wrapper">
	<div class="main">
	    <div class="header">
		<ul>
		    <li><a class="main_header_link" href="#phones">All phones</a></li>
		    <li><a class="main_header_link" href="#profile">Profile</a></li>
		    <li class="logged_as_block" ng-if="typeof [[currentUserName]] !== undefined">Logged as: <a href="#profile"> [[currentUserName]] </a></li>
		    <input ng-model="phone_search" class="header_search" name="phone_search" placeholder="Search">
		</ul>
	    </div>

	    <div class="container">
		<a href="" ng-click="hideFeedbackForm = hideFeedbackForm ? false : true">
		    <div class="feedback"><br><br><br><br><br><br>
			 <p class="feedback_text">Feedback</p>

		    </div>
		</a>
		<div ng-controller="MainController" ng-hide="hideFeedbackForm" class="feedback_fullsize">
		    <form>
			<div class="form-group">
			    <input type="email" class="form-control" placeholder="Email" ng-model="Feedback.email">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" placeholder="Author" ng-model="Feedback.author">
			</div>
			<div class="form-group">
			    <textarea rows="3" class="form-control" ng-model="Feedback.message">Please enter your message...</textarea>
			</div>
			<button class="btn btn-primary" ng-click="sendFeedback()">Submit</button>
		    </form>
		</div>
		<div ui-view></div>
	    </div>
		@yield('page_content')
	</div>
	    <div id="footer">
	    &copy; developed by Dmitry
	    </div>
	</div>
    </body>
</html>