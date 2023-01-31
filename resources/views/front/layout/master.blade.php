<!DOCTYPE html>
<html dir="{{ app()->getLocale()=='ar'?'rtl':'ltr' }}"  lang="{{ app()->getLocale()=='ar'?'rtl':'ltr' }}">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
@include('front.layout.header')
</head>
<body style="font-family: 'Cairo', sans-serif !important;">
<!-- start preloader area -->
<div id="loading">
    <div class="loader"></div>
</div>
<!-- end preloader area -->
@include('front.layout.navebar')
@yield('content')
@include('front.layout.footer')
@include('front.layout.footerjs')
</body>
</html>
