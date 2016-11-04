@extends('layout.responsive')


@section('page_content')
    <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
    </div>
    <div ng-controller="MainController">
	<div>
	    <p>Please enter your Name: <input type="text" ng-model="name"></p>
	    Hello <p ng-bind="name"></p>
	</div>
	<div>
	    First Name: <input type="text" ng-model="firstName"><br>
	    Last Name: <input type="text" ng-model="lastName"><br>
	    <br>
	    Full Name: [[firstName]] [[lastName]]

	    <p ng-bind="firstName">fracas</p>

	    Full Name: [[fullName()]]
	</div>
	<div>
	    <ul>
		<li ng-repeat="i in names">
		    [[i.name + '' + i.country]]
		</li>
	    </ul>
	</div>
	<div ng-init="quontity=6;count=5">
	    5+5 = [[5+5]]
	    <br>
	    5*5 = [[5*5]]
	    <br>
	    6*5 = [[quontity*count]]
	</div>
    </div>
@endsection
