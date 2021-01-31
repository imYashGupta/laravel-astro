<!--Start Style -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('src/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/bootstrap.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/font-awesome.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/fonts.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/owl.carousel.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/owl.theme.default.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/magnific-popup.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/style.css")}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset("src/css/design.css")}}">
<!-- Favicon Link -->
<link rel="shortcut icon" type="image/png" href="{{$appData['favicon'] }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="app-url" content="{{  $_SERVER['PHP_SELF'] }}">

@yield('styles')