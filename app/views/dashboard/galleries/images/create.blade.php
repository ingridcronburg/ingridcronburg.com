@extends('dashboard.layout')

@section('content')
  Hello!
  <br /><br />
  Upload a file!
  <br /><br />
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@store', $gallery->id], 'files' => true, 'method' => 'POST']) }}
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title') }}
  {{ Form::label('location', 'Location') }}
  {{ Form::text('location') }}
  {{ Form::file('photo') }}
  {{ Form::submit('Upload') }}
  {{ Form::close() }}
@stop
