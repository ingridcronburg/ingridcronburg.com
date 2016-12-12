<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Ingrid Cronburg</title>
    <script src="https://use.typekit.net/mjh8jod.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" type="text/css" href="/assets/css/build/app.css">
  </head>
  <body>
    <div class="container">
      @include('header')
      @yield('content')
      @section('scripts')
      <script src="/assets/js/vendor/jquery/dist/jquery.min.js"></script>
      <script src="/assets/js/vendor/bootstrap-sass-official/assets/javascripts/bootstrap.js"></script>
      @show
    </div>
  </body>
</html>
