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
                    <h3>Repeats</h3>
	<div ng-init="quontity=6;count=5">
	    5+5 = [[5+5]]
	    <br>
	    5*5 = [[5*5]]
	    <br>
	    6*5 = [[quontity*count]]
	</div>
                    <h3>CSS vs angular</h3>
                    <div ng-init="myColor='blue'">
                        <input style="background-color: [[myColor]]" ng-model="myColor">
                    </div>
                    <h3>Custom directive</h3>
                    <div my-custom-directive>
                    </div>
                    <h3>Input validation</h3>
                    <div>
                        <form name="myForm">
                            type your email:
                            <input type="email" name="myEmail" ng-model="test" required>
                            <span ng-show="myForm.myEmail.$error.email">Email is not valid!</span><br>
                            <span ng-show="myForm.myEmail.$valid">Email is required!</span>
                        </form>
                    </div>
    </div>
<style>
input.ng-invalid {
    background-color: red;
}
</style>
@endsection
