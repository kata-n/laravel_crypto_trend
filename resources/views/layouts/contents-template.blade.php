 <html>
  <head>
    <meta charset="utf-8">
    <title>Crypto Trend | @yield ('title','')</title>
    <meta name="description" content="@yield ('description')">
    <meta name=”keywords” content=”仮想通貨,Twitter,Crypto,トレンド,ニュース”>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="twitter:card" content="summary"/>
    <meta property="og:url" content="https://application-virtual-currency.shikatana.com/"/>
    <meta property="og:title" content="Crypto Trend"/>
    <meta property="og:description" content="Twitterでの仮想通貨のトレンドを知るきっかけに。まずはTwitterのアカウントを連携してみよう。"/>
    <meta property="og:image" content="{{ asset('images/top_view2.png') }}"/>
 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
  </head>

  <body>
     <div class="l-contain">
        <header class="l-header">
        @section('header')
        @show
        </header>

        @yield('content')

        <footer class="l-footer">
          @yield('footer')
        </footer>
      </div>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
