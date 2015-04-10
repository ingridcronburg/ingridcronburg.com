<html>
  <head>
    <link rel="stylesheet" href="/assets/css/build/app.css" media="screen" charset="utf-8" />
    <script src="/assets/js/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/assets/js/vendor/bootstrap-sass-official/assets/javascripts/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/dashboard">Ingrid Cronburg</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
          <li><a href="/dashboard/galleries">Galleries</a></li>
          <li><a href="/dashboard/posts">Posts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text">Logged in as {{ Auth::user()->name }}</p></li>
          <li><a href="/dashboard/logout">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
