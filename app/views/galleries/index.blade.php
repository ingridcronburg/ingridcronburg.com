@extends('layout')

@section('content')
<div class="row">
  <div class="galleries">
  @foreach ($galleries as $gallery)
    @if ($gallery->hasCoverImage())
    <div class="col-md-4 col-sm-6 col-xs-12">
      <a href="/galleries/{{ $gallery->id }}">
        <div class="gallery">
          <img src="{{ $gallery->getCoverImage() }}" />
          <div class="cover">
            <p>{{ $gallery->name }}</p>
          </div>
        </div>
      </a>
    </div>
    @endif
  @endforeach
  </div>
</div>
@endsection
