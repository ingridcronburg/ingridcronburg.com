@extends('layout')

@section('content')
<div class="carousel slide" data-interval="false">
  <div class="carousel-inner" role="listbox">
  @foreach($gallery->images as $key => $image)
    @if($key == 0)<div class="item active">@else<div class="item">@endif
      <img src="{{ $image->src }}" alt="{{ $image->title }}" />
      <div class="caption">
        <p>{{ $image->title }}</p>
        <p>{{ $image->location }}</p>
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
<div class="row text-center thumbnails">
@foreach($gallery->images as $key => $image)
    <img src="{{ $image->src }}" alt="{{ $image->title }}" data-index="{{ $key }}" />
@endforeach
</div>
@endsection

@section('scripts')
@parent
<script>
  //$('.thumbnails img:first').addClass('selected');

  $('.thumbnails img').click(function() {
    //$('.thumbnails img.selected').removeClass('selected');
    //$(this).addClass('selected');
    $('.carousel').carousel(parseInt($(this).attr('data-index')));
  });

  $('.right.carousel-control').click(function() {
    $('.carousel').carousel('next');
    //var $img = $('.active > img').attr('src');
    //$('.thumbnails img.selected').removeClass('selected');
    //$('.thumbnails img[src="'+$img+'"]').parent().next().children().addClass('selected');
  });

  $('.left.carousel-control').click(function() {
    $('.carousel').carousel('prev');
    //var $img = $('.active > img').attr('src');
    //$('.thumbnails img.selected').removeClass('selected');
    //$('.thumbnails img[src="'+$img+'"]').parent().prev().children().addClass('selected');
  });
</script>
@endsection
