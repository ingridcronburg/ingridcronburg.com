@extends('layout')

@section('content')
<div class="row text-center">
@foreach ($galleries as $gallery)
  @if ($gallery->hasCoverImage())
  <div class="gallery vs">
    <a href="/galleries/{{ $gallery->id }}">
      <h1>{{ $gallery->name }}</h1>
      <img src="{{ $gallery->getCoverImage() }}" />
    </a>
  </div>
  @endif
@endforeach
</div>
@endsection
