@extends('layout')

@section('content')
<div class="post">
  <h1>
    {{ $post->title }}
  </h1>
  <p>
    {{ $post->content }}
  </p>
  <p>
    {{ $post->tags->count() }}
  </p>
</div>
@endsection
