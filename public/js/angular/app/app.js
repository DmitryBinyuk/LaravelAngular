var app = angular.module('app', ['ngRoute', 'ui.router', 'satellizer']);

app.config(function($interpolateProvider, $stateProvider, $urlRouterProvider, $authProvider, $provide){//, $stateProvider, $urlRouterProvider, $authProvider,$provide){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    
    $authProvider.loginUrl = '/api/authenticate';
 
    $urlRouterProvider.otherwise('/login');

    $stateProvider
	.state('login', {
	    url: '/login',
	    templateUrl: '/js/angular/app/login.html',
	    controller: 'AuthController'
	})
	.state('register', {
	    url: '/register',
	    templateUrl: '/js/angular/app/register.html',
	    controller: 'AuthController'
	})
	.state('phones', {
	url: '/phones',
	template: '<phones></phones>',
//	controller: 'TodoController'
    });

    function redirectWhenLoggedOut($q, $injector) {
	return {
	    responseError: function (rejection) {
		var $state = $injector.get('$state');
		var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

		angular.forEach(rejectionReasons, function (value, key) {
		    if (rejection.data.error === value) {
			localStorage.removeItem('user');
			$state.go('login');
		    }
		});

		return $q.reject(rejection);
	    }
	}
    }

    $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);
});

app.filter('myCustomFilter', function(){
    return function(x){
	var i, currentVal, text = "";
	for (i = 0; i < x.length; i++) {
	    currentVal = x[i];
	    if(currentVal == 'u'){
		currentVal = currentVal.toUpperCase();
	    }
	    text+=currentVal;
	}
	return text;
    };
});

app.service('hexify', function(){
    this.myFunc = function(x){
	return x.toString(16);
    };
});

app.component('phonel', {
  template: '<h1>!!!!!From component with love from [[$ctrl.from.name]]!</h1>',
  controller: function() {
    this.from = {name: 'Vasya'};
  }
});

app.component('phopro', {
  template: '<h1>From component with love from [[$ctrl.names]]!</h1>',
  controller: 'TemplateController'
});

app.component('phones', {
  templateUrl: 'phones',
  controller: 'PhoneListController'
});

app.component('phonedetail', {
  templateUrl: 'phone/:phoneId',
  controller: 'PhoneDetailController'
});

app.config(function($routeProvider){
//    $routeProvider
//    .when('/phones', {
//	template: '<phones></phones>'
//    })
//    .when('/phono/:phoneId', {
//	template: '<phonedetail></phonedetail>'
//    })
//    .otherwise('/phones');
});