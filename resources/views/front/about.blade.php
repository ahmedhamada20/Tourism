@extends('front.layout.master')
@section('title')
    {{trans('app.about')}}
@endsection
@section('css')
@endsection
@section('content')

    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>About Us</h1>
                <ul>
                    <li class="item"><a href="{{route('about')}}">Home</a></li>
                    <li class="item"><a ><i class='bx bx-chevrons-right'></i>About</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('upload/image_home/' . $setting->image_home)}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->

    <!-- start about section -->


    <section id="about" class="about-section about-style-three ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 m-auto">
                    <div class="about-content">
                        <div class="row">
                            <div class="col-12">
                                <h2>
                                    {{$about->name}}
                                </h2>
                                <p>
                                    {!!$about->notes!!}.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-10 m-auto">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        {!! $about->icon_1 !!}
                                        <h6>{{$about->title_1}}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        {!! $about->icon_2 !!}
                                        <h6>{{$about->title_2}}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        {!! $about->icon_3 !!}
                                        <h6>{{$about->title_3}}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        {!! $about->icon_4 !!}
                                        <h6>{{$about->title_4}}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        {!! $about->icon_5 !!}
                                        <h6>{{$about->title_5}}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="content-list">
                                        {!! $about->icon_6 !!}
                                        <h6>{{$about->title_6}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-btn">
                            <a href="{{route('contact')}}" class="btn-primary">{{trans('app.contact')}}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shape-1"><img src="{{asset('front/assets/img/shape1.png')}}" alt="Background Shape"></div>
        <div class="shape shape-2"><img src="{{asset('front/assets/img/shape2.png')}}" alt="Background Shape"></div>
        <div class="shape shape-3"><img src="{{asset('front/assets/img/shape3.png')}}" alt="Background Shape"></div>
        <div class="shape shape-4"><img src="{{asset('front/assets/img/shape4.png')}}" alt="Background Shape"></div>
    </section>


    <!-- end about section -->
    @if($wyh ==true)
    <!-- start about section -->
    <section id="about" class="about-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="video-content mb-30">
                        <div class="video-image">


                            <img src="{{asset('upload/why/'.$wyh->image)}}" alt="video" />

                        </div>
                        <a href="{{$setting->url}}" class="youtube-popup video-btn">
                            <i class='bx bx-right-arrow'></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content mb-30">
                        <h2>
                            {{$wyh->name}}
                        </h2>
                        <h6>
                            {!!$wyh->disc!!}
                        </h6>

                        <div class="about-btn">
                            <a href="{{route('contact')}}" class="btn-primary">{{trans('app.contact')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shape-1">
            <img src="{{asset('front/assets/img/shape1.png')}}" alt="Background Shape">
        </div>
        <div class="shape shape-2">
            <img src="{{asset('front/assets/img/shape2.png')}}" alt="Background Shape">
        </div>
    </section>
    <!-- end about section -->
    @endif
@endsection
@section('js')
@endsection

