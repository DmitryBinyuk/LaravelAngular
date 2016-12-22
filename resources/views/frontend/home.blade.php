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

	Function in controller
	<div>
	    <p ng-click="changeName()">[[firstName]]</p>
	</div>
	Filters:
	<div>
	    <ul>
		<li ng-repeat="x in persons | orderBy:'country'">
		    [[x.name + ' ' + x.country]]
		</li>
	    </ul>

	    <h3>Price: [[price | currency]]</h3>

	    Filter by character 'e':
	    <ul>
		<li ng-repeat="x in persons | filter:'e'">
		    [[x.name + ' ' + x.country]]
		</li>
	    </ul>

	    Filter by input data:
	    <input ng-model="search">
	    <ul>
		<li ng-repeat="x in persons | filter:search">
		    [[x.name + ' ' + x.country]]
		</li>
	    </ul>

	    Filter by column click:
	    <table border="1" width="100%">
		<tr>
		    <th ng-click="sortPersonBy('name')">Name</th>
		    <th ng-click="sortPersonBy('country')">Country</th>
		</tr>
		<tr ng-repeat="y in persons | orderBy:personOrderBy">
		    <td>[[y.name]]</td>
		    <td>[[y.country]]</td>
		</tr>
	    </table>

	    Custom filter:
	    <ul>
		<li ng-repeat="x in persons">
		    [[x.name | myCustomFilter]]
		</li>
	    </ul>
	</div>
	Location Service:
	<h2>[[currentUrl]]</h2>

	Http response:
	<input ng-model="phoneFilter">
	<ul>
	    <li ng-repeat="phone in myHttpResponse | filter:phoneFilter">
		[[phone.name + ' ' + phone.age]]
	    </li>
	</ul>
	STATUS:
	[[status]] ([[statusText]])<br>
	headers:
	[[headers]]<br>
	Config:
	[[config]]

	Custom service:<br>
	hex converter<br>
	<input ng-model="valueToConvert">
	<br>
	Converted:<br>
	[[convertedHex]]


	Http to Angular:<br>
	[[laravelHttpResponse.data]]
	<ul>
	    <li ng-repeat="phone in laravelHttpResponse.data">
		[[phone.name + ' ' + phone.brand_id]]
	    </li>
	</ul>
	<div ng-controller="TemplateController">
	    <a href="#test1">Test1</a>
	    <a href="#test2">Test2</a>
	    <a href="#testcontr">TestContr</a>
	    <div ng-view></div>
	</div>

    </div>

Component1
<phonel></phonel>dwsf<br>
Component2
<phopro></phopro>
<br><br><br>

<h3>Component3:</h3>
<phones></phones>
@endsection
