@extends('dashboard.layout')

@section('content')
  <p>This is where you will go to create a new gallery! Someday...</p>

  <h1>Create Gallery</h1>

  {{ Form::open(['action' => 'Dashboard\GalleriesController@store', 'method' => 'POST']) }}
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}
    {{ Form::submit('Create') }}
  {{ Form::close() }}
@stop
