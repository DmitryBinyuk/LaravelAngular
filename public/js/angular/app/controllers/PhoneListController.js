app.controller('PhoneListController', function($scope, $http) {
    
    $http.get('/api/v1/phone').then(function(response){
	$scope.products = response.data;
    });
    
    $http.get('/api/v1/brands').then(function(response){
	$scope.brands = response.data;
    });
});