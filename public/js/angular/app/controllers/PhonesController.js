app.controller('PhonesController', function($scope, $http) {
    
    $http.get('/api/v1/phones/list').then(function(response){
	$scope.laravelHttpResponse = response.data;
	$scope.lstatus = response.status;
	$scope.lstatusText = response.statusText;
	$scope.lheaders = response.headers;
	$scope.lconfig = response.config;
    });

});