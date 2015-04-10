@extends('dashboard.layout')

@section('content')
  <h1>Edit Image: {{ $image->title }}</h1>
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@update', $gallery->id, $image->id], 'files' => true, 'method' => 'PUT']) }}
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', $image->title) }}
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location', $image->location) }}
    {{ Form::file('photo') }}
    {{ Form::label('delete_photo', 'Delete Photo') }}
    {{ Form::checkbox('delete_photo') }}
    {{ Form::submit('Save') }}
  {{ Form::close() }}
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@destroy', $gallery->id, $image->id], 'method' => 'DELETE']) }}
    {{ Form::button('Delete', ['type' => 'submit']) }}
  {{ Form::close() }}
@stop
