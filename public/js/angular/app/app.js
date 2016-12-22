var app = angular.module('app', []);

app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.directive("myCustomDirective", function(){
    return {
        template: "Text from my custom  directive"
    };
});