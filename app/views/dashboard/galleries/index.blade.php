@extends('dashboard.layout')

@section('content')
  <p>You did it! You created the galleries page! Woohoo!</p>

  <h1>Galleries</h1>
  @foreach($galleries as $gallery)
    <ul>
      <li><a href="/dashboard/galleries/{{ $gallery->id }}/edit">{{ $gallery->name }}</a></li>
    </ul>
  @endforeach

  {{ Form::open(['action' => 'Dashboard\GalleriesController@create', 'method' => 'GET']) }}
  {{ Form::submit('New Gallery') }}
  {{ Form::close() }}

@stop
