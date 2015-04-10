@extends('dashboard.layout')

@section('content')
  @if(Session::has('message'))
  <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ Session::get('message') }}
  </div>
  @endif
  <h1>Galleries</h1>
  @foreach($galleries as $gallery)
  <ul>
    <li><a href="/dashboard/galleries/{{ $gallery->id }}/edit">{{ $gallery->name }}</a></li>
  </ul>
  @endforeach
  <a href="/dashboard/galleries/create" class="btn btn-primary">New Gallery</a>
@stop
