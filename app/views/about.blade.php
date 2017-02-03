@extends('layout')

@section('content')
<div class="row">
  <div class="col-sm-4">
    <img src="/assets/img/ingrid.jpg" id="portrait"></img>
  </div>
  <div class="col-sm-8">
    <h1>
      Hi, I'm Ingrid.
    <h1>
    <div class="text">
      <p class="background">
        I'm a software engineer in New York, NY.
      </p>
    </div>
    <div class="text">
      <p class="background">
        I studied mathematics at Mount Holyoke College in South Hadley, MA (class of 2009).
        I moved to New York in 2010 and spent 5 1/2 years as a budget analyst at the Metropolitan Opera.
        Outside of work, I taught myself to code and built the very website you're looking at now!
        I then enrolled in an immersive software engineering program at Fullstack Academy and graduated in fall 2016.
      </p>
    </div>
   <div class="text">
     <p class="background">
       I'm always looking to expand my programming knowledge with new languages and technologies and you can often catch me roaming around Manhattan with my camera!
     </p>
   </div>
   <div class="icons">
     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contact">
       Email Me
     </button>
     <a href="https://www.facebook.com/ingrid.cronburg" target="_blank"><img src="/assets/img/facebook.png"></img></a>
     <a href="https://www.instagram.com/ingrid_cronburg" target="_blank"><img src="/assets/img/instagram.png"></img></a>
     <a href="https://github.com/ingridcronburg" target="_blank"><img src="/assets/img/github.png"></img></a>
     <a href="https://linkedin.com/in/ingridcronburg" target="_blank"><img src="/assets/img/linkedin.png"></img></a>
  </div>
</div>
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="label">Contact Form</h4>
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
            <button type="submit" class="btn btn-primary" id="contact-btn">Submit</button>
          </div>
          <div class="message"></div>
        </form>
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
      .then(function() {
        form.find('.message').text('Success!');
        $('#contact').modal('toggle');
      })
      .fail(function() {
        form.find('.message').text('FUCKKKKKK!');
      });
    })
  </script>
@stop
