@extends('dashboard.layout')

@section('content')
  <h1>Edit Gallery: {{ $gallery->name }}</h1>

  <h2>Images</h2>
  <table class="table table-hover" id="images">
    <tbody class="sortable">
    @foreach($gallery->images->sortBy('sort_order') as $image)
    <tr data-href="/dashboard/galleries/{{ $gallery->id }}/images/{{ $image->id }}/edit" data-id="{{ $image->id }}">
      <td>
        <img src="{{ $image->src }}" />
        <div class="cover">
          <p>{{ $image->title }}</p>
          <p>{{ $image->location }}</p>
        </div>
      </td>

    </tr>
    @endforeach
    </tbody>
  </table>
  <br />
  <a href="/dashboard/galleries/{{ $gallery->id }}/images/create" class="btn btn-primary">New Image</a>
  {{ Form::open(['action' => ['Dashboard\GalleriesController@update', $gallery->id], 'method' => 'PUT']) }}
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', Input::old('name', $gallery->name)) }}
      {{ $errors->first('name', '<p class="text-danger">:message</p>') }}
    </div>
    <div class="form-group">
      {{ Form::label('enabled', 'Enabled') }}
      {{ Form::checkbox('enabled', Input::old('enabled', $gallery->enabled)) }}
    </div>
    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
  {{ Form::open(['action' => ['Dashboard\GalleriesController@destroy', $gallery->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
  {{ Form::close() }}
  <a href="{{ action('Dashboard\GalleriesController@index') }}" class="btn btn-default">Back</a>
@stop

@section('scripts')
  <script src="/assets/js/vendor/jquery.ui/ui/core.js"></script>
  <script src="/assets/js/vendor/jquery.ui/ui/widget.js"></script>
  <script src="/assets/js/vendor/jquery.ui/ui/mouse.js"></script>
  <script src="/assets/js/vendor/jquery.ui/ui/sortable.js"></script>
  <script>
    $('[data-href]').click(function() {
      window.location = $(this).attr('data-href');
      return false;
    });

    $('.sortable').sortable({placeholder: 'sortable-images'})
                  .disableSelection()
                  .on('sortstop', function(event, ui) {
                    var ids = $(this).find('[data-id]').map(function() { return $(this).attr('data-id'); }).get();

                    $.get('/dashboard/galleries/{{ $gallery->id }}/images/order', {ids: ids});
                  });
  </script>
@stop
