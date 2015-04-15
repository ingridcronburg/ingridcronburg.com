@extends('dashboard.layout')

@section('content')
  <p>This is where you will go to create a new gallery! Someday...</p>
  <h1>Create Gallery</h1>
  {{ Form::open(['action' => 'Dashboard\GalleriesController@store', 'method' => 'POST']) }}
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name') }}
    </div>
  {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
@stop
