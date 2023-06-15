<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @php
    $css_file = "css/app.css";
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/users/dealmih.png') }}">
    <title>
        @yield('title', config('app.name', 'Dealmih'))
    </title>
    <meta content="classifids admin" />
	<meta name="google-site-verification" content="InKbq-eaJdFVhm5vQY7h6wLZMSUtCbTMekjszZEIXKs" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset($css_file) }}" rel="stylesheet" id="layout-css">
    <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-HCCBS00QJK"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-HCCBS00QJK');
        </script>
    

</head>

<body>
    <noscript>
       
    </noscript>
    <div id="app">
        @yield('content')
        <home-component />
         <router-view></router-view> 
    </div>
    <!-- built files will be auto injected -->
    @stack('scripts')
</body>

</html>
