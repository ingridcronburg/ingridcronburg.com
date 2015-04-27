@extends('dashboard.layout')

@section('content')
{{ Form::open(['action' => 'Dashboard\HomeController@authenticate', 'method' => 'POST']) }}
  <div class="form-group">
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email')) }}
    {{ $errors->first('email', '<p class="text-danger">:message</p>') }}
  </div>
  <div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
    {{ $errors->first('password', '<p class="text-danger">:message</p>') }}
  </div>
{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
@stop
