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
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>
    @foreach($galleries as $gallery)
      <tr>
        <td>{{ $gallery->id }}</td>
        <td><a href="/dashboard/galleries/{{ $gallery->id }}/edit">{{ $gallery->name }}</a></td>
        <td>{{ $gallery->created_at }}</td>
        <td>{{ $gallery->updated_at }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href="/dashboard/galleries/create" class="btn btn-primary">New Gallery</a>
@stop
