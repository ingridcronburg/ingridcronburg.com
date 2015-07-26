@extends('layout')

@section('content')
<div class="carousel slide" data-interval="false">
  <div class="carousel-inner" role="listbox">
  @foreach($gallery->images->sortByDesc('sort_order') as $key => $image)
    @if($key == 0)<div class="item active">@else<div class="item">@endif
      <img src="{{ $image->src }}" alt="{{ $image->title }}" />
      <div class="caption">
        {{ $image->title }}
        <br/>
        {{ $image->location }}
      </div>
    </div>
  @endforeach
  </div>
  <a class="left carousel-control" href="#carousel-previous" role="button" data-slide="prev">
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-next" role="button" data-slide="next">
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection

@section('scripts')
@parent
<script>
  $('.right.carousel-control').click(function() { $('.carousel').carousel('next'); });
  $('.left.carousel-control').click(function() { $('.carousel').carousel('prev'); });
</script>
@endsection
