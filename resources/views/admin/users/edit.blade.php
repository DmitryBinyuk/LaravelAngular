@extends('admin.layout.base')

@section('admin_content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <div class="box-body">
                    {{ Form::open(array('action' => ['Admin\Controllers\UsersController@postUpdate', $user->id])) }}
                    <div class="form-group">
                        {{ Form::label('Name', null, ['class' => 'control-label']) }}
                        {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Email', null, ['class' => 'control-label']) }}
                        {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                        <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
        </div>
    </section>
@endsection