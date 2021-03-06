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

app.directive("myCustomDirective", function(){
    return {
        template: "Text from my custom  directive"
    };
});    

app.service('SessionService', [
    '$injector',
    function($injector, $rootScope) {
      "use strict";

      this.checkAccess = function(event, toState, toParams, fromState, fromParams) {
        var $scope = $injector.get('$rootScope'),
            $sessionStorage = $injector.get('$sessionStorage');
    
	$rootScope = $injector.get('$rootScope');

        if (toState.data !== undefined) {
          if (toState.data.noLogin !== undefined && toState.data.noLogin) {
            // если нужно, выполняйте здесь какие-то действия 
            // перед входом без авторизации
          }
        } else {
          // вход с авторизацией
	  var datos = sessionStorage.getItem('key');
	  console.log('$sessionStorage: ', $sessionStorage.user);
          if ($sessionStorage.user) {
            $scope.$root.user = $sessionStorage.user;
	    
	    $rootScope.currentUserObject = JSON.parse($scope.$root.user);
	    
//	    console.log('root: ', $rootScope.currentUserObject.name);
          } else {
            // если пользователь не авторизован - отправляем на страницу авторизации
            event.preventDefault();
            $scope.$state.go('login');
          }
        }
      };
    }
]);
  
app.run([
  '$rootScope', '$state', '$stateParams', 'SessionService',
  function ($rootScope, $state, $stateParams, SessionService) {

    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
    $rootScope.hideFeedbackForm = true;

    $rootScope.user = null;

    // Authorization check
    $rootScope.$on('$stateChangeStart',
      function (event, toState, toParams, fromState, fromParams) {
        SessionService.checkAccess(event, toState, toParams, fromState, fromParams);
	
	 $rootScope.currentUserName = $rootScope.currentUserObject.name;
	 $rootScope.currentUserEmail = $rootScope.currentUserObject.email;
	 $rootScope.currentUserId = $rootScope.currentUserObject.id;

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