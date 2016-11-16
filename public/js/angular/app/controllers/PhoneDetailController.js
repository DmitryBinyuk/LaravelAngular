app.controller('PhoneDetailController', function($scope, $http, $routeParams) {
    
    var httpParam = $routeParams.phoneId;    

    $http.get('/api/v1/phoner/'+httpParam).then(function(response){
	$scope.phoneDetailResponse = response.data;
    });
    
});