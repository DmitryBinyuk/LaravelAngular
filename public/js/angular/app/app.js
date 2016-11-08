var app = angular.module('app', []);

app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
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

