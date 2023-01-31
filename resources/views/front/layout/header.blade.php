<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="Author: HiBootstrap, Category: Tourism, Multipurpose, HTML, SASS, Bootstrap"/>
<!-- title -->
@livewireStyles
<title>@yield('title')</title>
<!-- favicon -->
<link rel="icon" href="{{asset('front/assets/img/favicon.png')}}" type="image/png"/>
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.rtl.min.css')}}"/>
<!-- font-awesome CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/fontawesome.min.css')}}"/>
<!-- box-icon CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/boxicons.min.css')}}">
<!-- animate CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}"/>
<!-- bootstrap date-picker CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap-datepicker.min.css')}}">
<!-- magnific popup CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.min.css')}}"/>
<!-- owl-carousel CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}"/>
<!-- mean-menu CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/meanmenu.min.css')}}"/>
<!-- main style CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}"/>
<!-- Form Wizzerd -->


<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('front/assets/css/demo.css')}}" rel="stylesheet" />
<!-- responsive CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}"/>
<!-- theme dark CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/theme-dark.css')}}"/>
@if(App::getLocale()=='ar')
    <!-- bootstrap CSS -->

    <!-- rtl CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/rtl.css')}}"/>
@else

    <link rel="stylesheet" href="{{asset('front/lrt/css/style.css')}}"/>
@endif

@yield('css')
