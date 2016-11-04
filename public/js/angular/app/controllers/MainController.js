app.controller('MainController', function($scope) {
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
});