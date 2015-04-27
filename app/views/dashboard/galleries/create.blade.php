@extends('dashboard.layout')

@section('content')
  <h1>Create Gallery</h1>
  {{ Form::open(['action' => 'Dashboard\GalleriesController@store', 'method' => 'POST']) }}
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name') }}
      {{ $errors->first('name', '<p class="text-danger">:message</p>') }}
    </div>
  {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
@stop
