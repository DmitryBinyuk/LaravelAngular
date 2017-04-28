<link rel="stylesheet" href="{{asset('css/admin/login-registration.css')}}">


<div class="login-page">
    <div class="login_form">

        {{--Registration form--}}
        {{ Form::open(array('action' => ['Admin\Controllers\AuthController@postRegistration'], 'class' => 'register-form')) }}
            {{ Form::text('name', null, ['placeholder' => 'Name']) }}
            {{ Form::email('email', null, ['placeholder' => 'Email']) }}
            {{ Form::password('password', ['placeholder' => 'Password']) }}
            {{ Form::submit('create', ['class' => 'login_button']) }}
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        {{ Form::close() }}

        {{--Login form--}}
        {{ Form::open(array('action' => ['Admin\Controllers\AuthController@postLogin'], 'class' => 'login-form')) }}
            {{ Form::email('email', null, ['placeholder' => 'Email']) }}
            {{ Form::password('password', ['placeholder' => 'Password']) }}
            {{ Form::checkbox('remember_me', false, false, ['class' => 'remember_me_login']) }}
            {{ Form::label('remember_me', 'Remember me', ['class' => 'remember_me_label']) }}
            {{ Form::submit('login', ['class' => 'login_button']) }}
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        {{ Form::close() }}

    </div>
</div>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="{{asset('admin/js/login-registration.js')}}"></script>
