@extends('dashboard.layout')

@section('content')
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
    <tbody class="sortable">
    @foreach($galleries->sortBy('sort_order') as $gallery)
      <tr data-href="/dashboard/galleries/{{ $gallery->id }}/edit" data-id="{{ $gallery->id }}">
        <td>{{ $gallery->id }}</td>
        <td>{{ $gallery->name }}</td>
        <td>{{ $gallery->created_at }}</td>
        <td>{{ $gallery->updated_at }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href="/dashboard/galleries/create" class="btn btn-primary">New Gallery</a>
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

    $('.sortable').sortable({placeholder: 'sortable-galleries'})
                  .disableSelection()
                  .on('sortstop', function(event, ui) {
                    var ids = $(this).find('[data-id]').map(function() { return $(this).attr('data-id'); }).get();

                    $.get('/dashboard/galleries/order', {ids: ids});
                  });
  </script>
@stop
