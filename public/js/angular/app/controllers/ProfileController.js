app.controller('ProfileController', function($scope, $rootScope, $http, $stateParams, $injector) {
    
//$http.get('/api/v1/profile').then(function(response){
//	$scope.phoneDetailData = response.data;
//    });

    $sessionStorage = $injector.get('$sessionStorage');
    console.log('aaa', $sessionStorage.user);
	
    $scope.profileUpdate = function () {
	$sessionStorage = $injector.get('$sessionStorage');
	console.log('aaa', $sessionStorage.user);

	$http.post('/api/v1/profile',$scope.newUser)
	    .success(function(data){
		$scope.email=$scope.newUser.email;
		$scope.password=$scope.newUser.password;
		$scope.login();
	})

    };

});