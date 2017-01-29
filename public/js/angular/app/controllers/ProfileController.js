app.controller('ProfileController', function($scope, $rootScope, $http, $stateParams, $injector, Profile) {
    $sessionStorage = $injector.get('$sessionStorage');

    $scope.profileUserName = $rootScope.currentUserName;
    $scope.profileUserEmail = $rootScope.currentUserEmail;

    $sessionStorage = $injector.get('$sessionStorage');
    
//    alert($rootScope.currentUserObject.name);
    
    $scope.profileData = {};
    $scope.updatedUser = {};
    $scope.profileHasErrors = false;
    $scope.profileUpdate = function() {
	
	$scope.profileData.id = $rootScope.currentUserId;
	
        Profile.update($scope.profileData)
            .success(function(data) {
		
		$rootScope.currentUserName = $scope.profileData.name;
		
		$rootScope.currentUserObject.name = $scope.profileData.name;
		$rootScope.currentUserEmail = $scope.profileData.email;
		$rootScope.currentUserId = $scope.profileData.id;
		
		$scope.updatedUser.name = $scope.profileData.name;
		$scope.updatedUser.email = $scope.profileData.email;
		$scope.updatedUser.id = $scope.profileData.id;

		$sessionStorage.user = $scope.updatedUser;
            })
            .error(function(data) {
		$scope.profileHasErrors = true;
		$scope.errorText = data[Object.keys(data)[0]];
		console.log(data[Object.keys(data)[0][0]]);
            });
    };

});