angular.module('session', [])

.service('SessionService', [
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