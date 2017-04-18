app.controller('AuthController',  function($auth, $state, $http, $rootScope, $scope, $injector) {
    $sessionStorage = $injector.get('$sessionStorage');
    $scope.email='';
    $scope.password='';
    $scope.newUser={};
    $scope.loginError=false;
    $scope.loginErrorText='';

        $scope.login = function() {

            var credentials = {
                email: $scope.email,
                password: $scope.password
            }

            $auth.login(credentials).then(function() {
//                $http.defaults.headers.common['Authorization'] = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2FuZ3VsYXJvcy5sb2NhbFwvYXBpXC92MVwvYXV0aGVudGljYXRlIiwiaWF0IjoxNDg1NzMwNDMzLCJleHAiOjE0ODU3MzQwMzMsIm5iZiI6MTQ4NTczMDQzMywianRpIjoiZmEzZGI4MTgxZmE1N2RkMjE3ZTYzY2M2NTU3OGFiNWIifQ.m7koUYCUKKsTobMzVlixNkcQLpS4hjgbvk30LNyQpT8';
                return $http.get('/api/v1/authenticate/user');

            }, function(error) {
                $scope.loginError = true;

            }).then(function(response) {
                $rootScope.currentUser = response.data.user;
                $scope.loginError = false;
                $scope.loginErrorText = '';
		
		//new block
		var user = JSON.stringify(response.data.user);	
		localStorage.setItem('user', user);
		sessionStorage.setItem('user', user);
		
		$sessionStorage.user = user;
		$rootScope.authenticated = true;

                $state.go('phones');
            });
        }

        $scope.register = function () {

            $http.post('/api/v1/register',$scope.newUser)
                .success(function(data){
                    $scope.email=$scope.newUser.email;
                    $scope.password=$scope.newUser.password;
                    $scope.login();
            })

        };


});