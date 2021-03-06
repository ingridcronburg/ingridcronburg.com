<html>
  <head>
    <link rel="stylesheet" href="/assets/css/build/dashboard.css" media="screen" charset="utf-8" />
    <script src="/assets/js/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/assets/js/vendor/bootstrap-sass-official/assets/javascripts/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/dashboard/galleries">Ingrid Cronburg</a>
        </div>
        @if(Auth::check())
        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text">Logged in as {{ Auth::user()->name }}</p></li>
          <li><a href="/dashboard/logout">Logout</a></li>
        </ul>
        @endif
      </div>
    </nav>
    <div class="container">
      @include('dashboard.message')
      @yield('content')
    </div>
    @yield('scripts')
  </body>
</html>
