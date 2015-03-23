@extends('dashboard.layout')

@section('content')
  <p>You did it! You created the galleries page! Woohoo!</p>

  <h1>Galleries</h1>
  <ul>
    @foreach($galleries as $gallery)
    <li><a href="/dashboard/galleries/{{ $gallery->id }}/edit">{{ $gallery->name }}</a></li>
    @endforeach
  </ul>
@stop
