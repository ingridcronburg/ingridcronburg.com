@extends('layout')

@section('content')
<div class="page-gallery">
  <div class="row text-center thumbnails">
    <span class="glyphicon glyphicon-chevron-left"></span>
    @foreach($gallery->images as $key => $image)
      <img src="{{ $image->src }}" alt="{{ $image->title }}" data-index="{{ $key }}" class="{{ $key != 0 ?: 'selected' }} {{ $key <= 4 ?: 'hidden' }}" />
    @endforeach
    <span class="glyphicon glyphicon-chevron-right"></span>
  </div>
  <div class="carousel slide" data-interval="false">
    <div class="carousel-inner" role="listbox">
    @foreach($gallery->images as $key => $image)
      <div data-index={{ $key }} class="item {{ $key != 0 ?: 'active' }}">
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
</div>
@endsection

@section('scripts')
@parent
<script>
  function setThumbnailState(index) {
    $('.thumbnails img.selected').removeClass('selected');
    var thumbnail = $('.thumbnails img:eq(' + index + ')');
    thumbnail.addClass('selected');

    var clicked = thumbnail.data('index');
    $('.thumbnails img').addClass('hidden');

    $('.thumbnails img').each(function(i, val) {
      var index = $(this).data('index');
      var before_size = 2, after_size = 2;

      if (clicked < 3) {
        after_size = 4 - clicked;
        before_size = clicked;
      }

      if (clicked > $('.thumbnails img').length - 4) {
        before_size = clicked - ($('.thumbnails img').length - 5);
        after_size = $('.thumbnails img').length - 1 - clicked;
      }

      if (index >= clicked - before_size && index <= clicked + after_size) {
        $(this).removeClass('hidden');
      }
    });
  }

  $('.thumbnails img').click(function() {
    setThumbnailState($(this).data('index'));
    $('.carousel').carousel(parseInt($(this).data('index')));
  });

  $('.right.carousel-control, .glyphicon-chevron-right').click(function() {
    $('.carousel').carousel('next');
  });

  $('.left.carousel-control, .glyphicon-chevron-left').click(function() {
    $('.carousel').carousel('prev');
  });

  $('.carousel').on('slide.bs.carousel', function(event) {
    setThumbnailState($(event.relatedTarget).data('index'));
  });
</script>
@endsection
