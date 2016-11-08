app.controller('MainController', function($scope, $location, $http, hexify) {
    $scope.firstName = "Dmitry";
    $scope.lastName = "Finagan";
    
    $scope.fullName = function(){
	return $scope.firstName + " " + $scope.lastName;
    }
    
    $scope.names = [
	{name:'Yami', country:'Ukraine'},
	{name:'Sami', country:'USA'},
	{name:'Tati', country:'Austria'},
    ];
    
    $scope.changeName = function(){
	$scope.firstName = "New Dima";
    };
    
    $scope.persons = [
	{name:'Jhon', country:'England'},
	{name:'Don', country:'USA'},
	{name:'Tsuen', country:'France'},
	{name:'Mumbato', country:'Ephiopia'},
	{name:'Sasha', country:'Russia'},
	{name:'Tony', country:'Norway'},
    ];
    
    $scope.price = 58;
    
    $scope.sortPersonBy = function(x){
	$scope.personOrderBy = x;
    };
    
    $scope.currentUrl = $location.absUrl();
    
    $http.get('/phones.json').then(function(response){
	$scope.myHttpResponse = response.data;
	$scope.status = response.status;
	$scope.statusText = response.statusText;
	$scope.headers = response.headers;
	$scope.config = response.config;
    });
    
    $scope.valueToConvert = 255;
    
    $scope.convertedHex = hexify.myFunc($scope.valueToConvert);

});