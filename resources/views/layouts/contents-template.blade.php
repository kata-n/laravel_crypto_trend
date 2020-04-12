 <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="twitter:card" content="summary"/>
    <meta property="og:url" content="https://application-keigen-quiz.shikatana.com/"/>
    <meta property="og:title" content="Crypto Trend"/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content="{{ asset('images/top_view2.png') }}"/>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Crypto Trend | @yield ('title','')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  </head>

  <body>
    <header class="l-header">
    @section('header')
      <div class="header__logo"><a href="/">Crypto Trend</a></div>
    @show
    </header>

    @if (session('flash_message'))
      <div class="alert alert-primary text-center" role="alert">
        {{ session('flash_message') }}
      </div>
    @endif

    <div class="l-container">
      @yield('content')
    </div>

    <footer id="footer" class="footer">
      @yield('footer')
    </footer>
  </body>
</html>
