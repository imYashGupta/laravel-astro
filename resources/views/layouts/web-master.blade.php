<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><!--<![endif]-->
<!-- Begin Head -->
<head>
<title>@yield('title',$appData['name'].' | '.$appData['title'])</title>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="description" content="Astrology">
<meta name="keywords" content="Astrology, signs, gemstones, tarot, horoscopes, cards, numerology, Zodiac">
<meta name="author" content="hsoft" >
<meta name="MobileOptimized" content="320">
@include('pages.includes.styles')

</head>

<body>
    <div id="wrapper">

        @include('pages.includes.header')
        <!--Slider Start-->
        @yield('content')
        @include('pages.includes.footer')
    </div>
@include('pages.includes.scripts') 
</body>
</html>