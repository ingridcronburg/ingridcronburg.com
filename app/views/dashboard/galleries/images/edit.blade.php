@extends('dashboard.layout')

@section('content')
  <h1>Edit Image: {{ $image->title }}</h1>
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@update', $gallery->id, $image->id], 'files' => true, 'method' => 'PUT']) }}
    @if($image->filename)
    <div class="form-group">
      <img src="http://ingridcronburg.com.s3.amazonaws.com/{{ $image->filename }}" />
      <br/>
      {{ Form::label('delete_photo', 'Delete Photo') }}
      {{ Form::checkbox('delete_photo') }}
    </div>
    @else
    <div class="form-group">
      {{ Form::label('photo', 'Choose Image to Upload') }}
      {{ Form::file('photo') }}
    </div>
    @endif
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', $image->title) }}
    </div>
    <div class="form-group">
      {{ Form::label('location', 'Location') }}
      {{ Form::text('location', $image->location) }}
    </div>
    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@destroy', $gallery->id, $image->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
  {{ Form::close() }}
@stop
