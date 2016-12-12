@extends('dashboard.layout')

@section('content')
  <h1>Edit Image: {{ $image->title }}</h1>
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@update', $gallery->id, $image->id], 'files' => true, 'method' => 'PUT']) }}
    @if($image->filename)
    <div class="form-group">
      <img src="{{ $image->src }}" />
      <br/>
      {{-- {{ Form::label('delete_photo', 'Delete Photo') }} --}}
      {{-- {{ Form::checkbox('delete_photo') }} --}}
    </div>
    @else
    <div class="form-group">
      {{ Form::label('photo', 'Choose Image to Upload') }}
      {{ Form::file('photo') }}
      {{ $errors->first('photo', '<p class="text-danger">:message</p>') }}
    </div>
    @endif
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', $image->title) }}
      {{ $errors->first('title', '<p class="text-danger">:message</p>') }}
    </div>
    <div class="form-group">
      {{ Form::label('location', 'Location') }}
      {{ Form::text('location', $image->location) }}
      {{ $errors->first('location', '<p class="text-danger">:message</p>') }}
    </div>
    <div class="form-group">
      {{ Form::label('enabled', 'Enabled') }}
      {{ Form::checkbox('enabled', null, $image->enabled) }}
    </div>
    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
  {{ Form::open(['action' => ['Dashboard\Galleries\ImagesController@destroy', $gallery->id, $image->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
  {{ Form::close() }}
  <a href="{{ action('Dashboard\GalleriesController@edit', $gallery->id) }}" class="btn btn-default">Back</a>
@stop
