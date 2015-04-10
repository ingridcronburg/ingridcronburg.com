@extends('dashboard.layout')

@section('content')
  <h1>Edit Gallery: {{ $gallery->name }}</h1>
  {{ Form::open(['action' => ['Dashboard\GalleriesController@update', $gallery->id], 'method' => 'PUT']) }}
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', $gallery->name) }}
    {{ Form::submit('Save') }}
  {{ Form::close() }}
  {{ Form::open(['action' => ['Dashboard\GalleriesController@destroy', $gallery->id], 'method' => 'DELETE']) }}
    {{ Form::button('Delete', ['type' => 'submit']) }}
  {{ Form::close() }}
  <h2>Images</h2>
  @foreach($gallery->images as $image)
  <a href="/dashboard/galleries/{{ $gallery->id }}/images/{{ $image->id }}/edit"><img src="http://ingridcronburg.com.s3.amazonaws.com/{{ $image->filename }}" /></a>
  @endforeach
  <a href="/dashboard/galleries/{{ $gallery->id }}/images/create" class="btn btn-primary">New Image</a>
@stop
