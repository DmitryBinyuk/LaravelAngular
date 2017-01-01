app.controller('PhoneDetailController', function($scope, $http, $stateParams) {
    
    var phoneId = $stateParams.phoneId;    

    $http.get('/api/v1/phoner/'+phoneId).then(function(response){
	$scope.phoneDetailResponse = response.data;
    });
    
});