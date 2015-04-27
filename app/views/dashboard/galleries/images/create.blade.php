@extends('dashboard.layout')

@section('content')
  <h1>New Image:</h1>
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@store', $gallery->id], 'files' => true, 'method' => 'POST']) }}
  <div class="form-group">
    {{ Form::label('photo', 'Choose Image to Upload') }}
    {{ Form::file('photo') }}
    {{ $errors->first('photo', '<p class="text-danger">:message</p>') }}
  </div>
  <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title') }}
    {{ $errors->first('title', '<p class="text-danger">:message</p>') }}
  </div>
  <div class="form-group">
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location') }}
    {{ $errors->first('location', '<p class="text-danger">:message</p>') }}
  </div>
  {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
@stop
