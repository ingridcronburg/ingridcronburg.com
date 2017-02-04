@extends('layout')

@section('content')
<div class="page-web">
  <div class="project">
    <div class="row">
      <div class="col-xs-12">
        <h1>Dashboard<h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb15-sm">
        <figure>
          <img src="/assets/img/cms-1.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
      <div class="col-sm-6">
        <figure>
          <img src="/assets/img/cms-2.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p>
          I built a custom CMS for my portfolio website to make it easier to edit the photo galleries.
          The galleries and links to the images (in Amazon S3) are stored in a MySQL database.
          The CMS was built with PHP and Laravel and allows admin users to maintain the galleries and images.
          Galleries and images can be created, edited, and deleted with just a few&nbsp;simple&nbsp;clicks.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="https://github.com/ingridcronburg/ingridcronburg.com" target="_blank" class="btn btn-primary">GitHub</a>
      </div>
    </div>
  </div>
  <hr>
  <div class="project">
    <div class="row">
      <div class="col-xs-12">
        <h1>Mosaic<h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 mb15-sm">
        <figure>
          <img src="/assets/img/original.jpg" data-toggle="modal" data-target="#image" />
          <figcaption>Self-Portrait, 2015</figcaption>
        </figure>
      </div>
      <div class="col-sm-4 mb15-sm">
        <figure>
          <img src="/assets/img/1000.png" data-toggle="modal" data-target="#image" />
          <figcaption>Mosaic with 1,000 tiles</figcaption>
        </figure>
      </div>
      <div class="col-sm-4">
        <figure>
          <img src="/assets/img/10000.png" data-toggle="modal" data-target="#image" />
          <figcaption>Mosaic with 10,000 tiles</figcaption>
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p>
          As an avid photographer, I've accumulated a lot of photos over the years.
          Mosaic is a script that I wrote in an effort to do something with all of my photos by creating a photo mosaic.
          I set up a PostgreSQL database with the filepaths for the photos and incorporated an npm package called color-thief to determine the dominant color of&nbsp;each&nbsp;photo.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="https://github.com/ingridcronburg/mosaic" target="_blank" class="btn btn-primary">GitHub</a>
      </div>
    </div>
  </div>
  <hr>
  <div class="project">
    <div class="row">
      <div class="col-xs-12">
        <h1>ResourceDot</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb15-sm">
        <figure>
          <img src="/assets/img/resourcedot-1.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
      <div class="col-sm-6">
        <figure>
          <img src="/assets/img/resourcedot-2.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p>
          This project came out of a discussion with some of my classmates at Fullstack Academy.
          We often found it difficult to share technology articles and tutorials with each other and wanted to find a way to make it easier.
          ResourceDot is a social network aimed at developers learning new technologies.
          It uses a PostgreSQL database with Sequelize and was built with Express/Node.js on the backend and Angular on&nbsp;the&nbsp;frontend.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="http://www.resource.cool" target="_blank" class="btn btn-primary mr20">Demo</a>
        <a href="https://github.com/ingridcronburg/resource-dot" target="_blank" class="btn btn-primary">GitHub</a>
      </div>
    </div>
  </div>
  <hr>
  <div class="project">
    <div class="row">
      <div class="col-xs-12">
        <h1>Employee Tracker</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb15-sm">
        <figure>
          <img src="/assets/img/employee-1.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
      <div class="col-sm-6">
        <figure>
          <img src="/assets/img/employee-2.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p>
          Employee Tracker is an app designed for a company's HR team to maintain employee information.
          It allows users to add or remove employees as well as update information.
          It was built with PHP on the backend and Angular on the frontend.
          If you're interested in a demo, email me for login&nbsp;credentials!
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="http://employee-tracker.ingridcronburg.com" target="_blank" class="btn btn-primary mr20">Demo</a>
        <a href="https://github.com/ingridcronburg/employee-tracker" target="_blank" class="btn btn-primary">GitHub</a>
      </div>
    </div>
  </div>
  <hr>
  <div class="project last">
    <div class="row">
      <div class="col-xs-12">
        <h1>Flight Path</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 mb15-sm">
        <figure>
          <img src="/assets/img/flightpath-1.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
      <div class="col-sm-6">
        <figure>
          <img src="/assets/img/flightpath-2.png" data-toggle="modal" data-target="#image" />
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p>
          This project was the result of a desire to gain experience with the Google Maps API.
          It features a directory of airports in the United States and plots the flight path between the two selected airports.
          It uses data from the OpenFlights Airports database stored in a MySQL database and was built with Express/Node.js on the backend and Angular on&nbsp;the&nbsp;frontend.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <a href="http://flight-path.ingridcronburg.com" target="_blank" class="btn btn-primary mr20">Demo</a>
        <a href="https://github.com/ingridcronburg/flight-path" target="_blank" class="btn btn-primary">GitHub</a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="label">
    <div class="modal-dialog" role="document">
      <div class="modal-content"></div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
  @parent
  <script>
    $('#image')
    .on('show.bs.modal', function (event) {
      var isRect = $(event.relatedTarget).width() > $(event.relatedTarget).height();
      var $image = $(event.relatedTarget).clone(true)
                                         .removeClass('screenshot')
                                         .removeAttr('data-toggle')
                                         .removeAttr('data-target');

      $('.modal-content', this).html($image);
      $('.modal-dialog', this).addClass(isRect ? 'landscape' : 'portrait')
                              .removeClass(isRect ? 'portrait' : 'landscape');
    })
    .on('click', function() {
      $(this).modal('toggle');
    });
  </script>
@stop
