@extends('layout.responsive')

@section('page_content')
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
	<div >
	    <p>Please enter your Name: <input type="text" ng-model="name"></p>
	    Hello <p ng-bind="name"></p>
	</div>
@endsection
