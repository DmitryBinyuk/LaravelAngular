var app = angular.module('app', ['ngRoute', 'ui.router', 'satellizer', 'ngStorage', 'commentService', 'profileService', 'session', 'angularUtils.directives.dirPagination']);

app.config(function($interpolateProvider, $stateProvider, $urlRouterProvider, $authProvider, $provide){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    
//    $authProvider.loginUrl = '/api/v1/authenticate';
 
    $urlRouterProvider.otherwise('/phones');

    $stateProvider
	.state('login', {
	    url: '/login',
	    templateUrl: '/js/angular/app/login.html',
	    controller: 'AuthController',
	    data: {
		'noLogin': true
	    }
	})
	.state('register', {
	    url: '/register',
	    templateUrl: '/js/angular/app/register.html',
	    controller: 'AuthController',
	    data: {
		'noLogin': true
	    }
	})
	.state('phones', {
	url: '/phones',
	template: '<phones></phones>',
    })
    .state('/phone', {
	url: '/phone/:phoneId',
	template: '<phonedetail></phonedetail>',
    })
    .state('/profile', {
	url: '/profile',
	template: '<profile></profile>',
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
  
app.run([
  '$rootScope', '$state', '$stateParams', 'SessionService',
  function ($rootScope, $state, $stateParams, SessionService) {

    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
    $rootScope.hideFeedbackForm = true;

    $rootScope.user = null;

    // Здесь мы будем проверять авторизацию
    $rootScope.$on('$stateChangeStart',
      function (event, toState, toParams, fromState, fromParams) {
        SessionService.checkAccess(event, toState, toParams, fromState, fromParams);
	
	 $rootScope.currentUserName = $rootScope.currentUserObject.name;
	 $rootScope.currentUserEmail = $rootScope.currentUserObject.email;
	 $rootScope.currentUserId = $rootScope.currentUserObject.id;
	 
//	console.log('roo_ ', $rootScope.currentUserObject.name);
      }
    );
  }
])  

app.factory('Auth', function(){
var user;

return{
    setUser : function(aUser){
        user = aUser;
    },
    isLoggedIn : function(){
        return(user)? user : false;
    }
  }
})

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

app.component('profile', {
  templateUrl: 'profile',
  controller: 'ProfileController'
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