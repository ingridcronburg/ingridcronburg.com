@extends('layout')

@section('content')
<div class="posts">
  @foreach($posts as $post)
  <div class="post">
    <h1>
      <a href="/posts/{{ $post->id }}/{{ $post->slug }}">
        {{ $post->title }}
      </a>
    </h1>
    <p>
      {{ $post->summary }}
    </p>
  </div>
  @endforeach
</div>
@endsection
