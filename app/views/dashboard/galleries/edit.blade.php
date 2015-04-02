@extends('dashboard.layout')

@section('content')

  <h1>Edit Gallery: {{ $gallery->name }}</h1>

  {{ Form::open(['action' => ['Dashboard\GalleriesController@update', $gallery->id], 'method' => 'PUT']) }}
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}
    {{ Form::submit('Save') }}
  {{ Form::close() }}

  {{ Form::open(['action' => ['Dashboard\GalleriesController@destroy', $gallery->id], 'method' => 'DELETE']) }}
    {{ Form::button('Delete', ['type' => 'submit']) }}
  {{ Form::close() }}

@stop
