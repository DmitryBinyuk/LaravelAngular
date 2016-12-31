var app = angular.module('app', ['ngRoute']);

app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.directive("myCustomDirective", function(){
    return {
        template: "Text from my custom  directive"
    };
});    

app.filter('myCustomFilter', function(){
    return function(x){
	var i, currentVal, text = "";
	for (i = 0; i < x.length; i++) {
	    currentVal = x[i];
	    if(currentVal == 'u'){
		currentVal = currentVal.toUpperCase();
	    }
	    text+=currentVal;
	}
	return text;
    };
});

app.service('hexify', function(){
    this.myFunc = function(x){
	return x.toString(16);
    };
});

//app.config(function($routeProvider){
//    $routeProvider
//    .when('/test1', {
//	template: "<p style='color:yellow;'>Test template for route</p>"
//    })
//    .when('/test2', {
//	template: "<p style='color:green;'>Test template for route 2</p>"
//    })
//    .otherwise({
//	template: "<p style='color:blue;'>Default template!</p>"
//    })
//    .when('/testcontr', {
//	controller: "TemplateController"
//    })
//});

app.component('phonel', {
  template: '<h1>!!!!!From component with love from [[$ctrl.from.name]]!</h1>',
  controller: function() {
    this.from = {name: 'Vasya'};
  }
});

app.component('phopro', {
  template: '<h1>From component with love from [[$ctrl.names]]!</h1>',
  controller: 'TemplateController'
});

app.component('phones', {
  templateUrl: 'phones',
  controller: 'PhoneListController'
});

app.component('phonedetail', {
  templateUrl: 'phone/:phoneId',
  controller: 'PhoneDetailController'
});

app.config(function($routeProvider){
    $routeProvider
    .when('/phones', {
	template: '<phones></phones>'
    })
    .when('/phono/:phoneId', {
	template: '<phonedetail></phonedetail>'
    })
    .otherwise('/phones');
});