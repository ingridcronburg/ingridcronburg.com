@extends('layout')

@section('content')
<div class="carousel slide" data-interval="false">
  <div class="carousel-inner" role="listbox">
  @foreach($gallery->images->sortByDesc('sort_order')->values() as $key => $image)
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
<div class="thumbnails">
  <div class="row">
    @foreach($gallery->images->sortByDesc('sort_order')->values() as $key => $image)
      <div class="col-xs-2">
        <img src="{{ $image->src }}" alt="{{ $image->title }}" data-index="{{ $key }}" />
      </div>
    @endforeach
</div>
</div>
@endsection

@section('scripts')
@parent
<script>
  setTimeout(function(){
    $('.thumbnails').addClass('fade-out');
  }, 1000);

  $('.thumbnails img').click(function() {
    $('.carousel').carousel(parseInt($(this).attr('data-index')));
  });

  $('.right.carousel-control').click(function() { $('.carousel').carousel('next'); });
  $('.left.carousel-control').click(function() { $('.carousel').carousel('prev'); });
</script>
@endsection
