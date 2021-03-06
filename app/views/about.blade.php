@extends('layout')

@section('content')
<div class="page-about">
  <div class="row">
    <div class="col-sm-6" class="portrait">
      <img src="/assets/img/ingrid.jpg" class="mb20"/>
    </div>
    <div class="col-sm-6">
      <h1 class="vs">
        Hi, I'm Ingrid.
      </h1>
      <p class="vs">
        I'm a software engineer in New York, New York.
      </p>
      <p class="vs">
        When I'm not coding, I like to knit, run, and explore the city with my camera.
      </p>
      <button type="button" class="btn btn-primary btn-lg mr20" data-toggle="modal" data-target=".contact-modal">
        Email Me
      </button>
      <div class="icons mt20">
        <a href="https://linkedin.com/in/ingridcronburg" target="_blank"><img src="/assets/img/linkedin.png" /></a>
        <a href="https://github.com/ingridcronburg" target="_blank"><img src="/assets/img/github.png" /></a>
        <a href="https://www.instagram.com/ingrid_cronburg" target="_blank"><img src="/assets/img/instagram.png" /></a>
      </div>
    </div>
  </div>
  <div class="modal fade contact-modal" tabindex="-1" role="dialog" aria-labelledby="label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Contact Form</h4>
        </div>
        <div class="modal-body">
          <form class="contact-form">
            <div class="form-group">
              <input class="form-control" type="text" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="text" rows="3" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary contact-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  @parent
  <script>
    $('.contact-form').on('submit', function(e) {
      e.preventDefault();
      var form = $(this);
      $.post('/api/contact', form.serialize())
    })
  </script>
@stop
