@extends('front.layout.master')
@section('title')
    destination Details
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>destination Details</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">Home</a></li>
                    <li class="item"><a href=""><i class='bx bx-chevrons-right'></i>destination Details</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('front/assets/img/page-title-area/destination-details.jpg')}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->

    <!-- start destination details section -->
    <section class="destinations-details-section pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{$destination->name}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="destination-details-desc mb-30">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12">
                                @if($destination->photo)
                                <div class="image mb-30">
                                    <img src="{{asset('admin/pictures/destenation/' . $destination->id .'/' .$destination->photo->Filename)}}" alt="Demo Image" />
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="content mb-20">
                            <h3>{{$destination->name}}</h3>
                            <p>
                                {{$destination->notes}}
                            </p>
                        </div>

                        <div class="info-content">
                            <h3 class="sub-title">destination Tours</h3>
                            <div class="row">
                                <div class="accordion accordion-flush mb-2 col-md-6" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <i class="fa-solid fa-bookmark"></i> {{trans('app.trip')}}
                                            </button>
                                        </h2>
                                        @foreach($trips as $row)
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <form action="" method="post">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                <h4>{{$row->name}}</h4>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="accordion accordion-flush mb-2 col-md-6" id="accordionFlushExample" >
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <i class="fa-solid fa-circle-info"></i> {{trans('app.more_info')}}
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                {!! $setting->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

{{--                <div class="col-lg-4 col-md-12">--}}
{{--                    <aside class="widget-area">--}}
{{--                        <div class="widget widget-search mb-30">--}}
{{--                        </div>--}}
{{--                        <div class="widget widget-video mb-30">--}}
{{--                            <div class="video-image">--}}
{{--                                <img src="assets/img/video-bg3.jpg" alt="video" />--}}
{{--                            </div>--}}
{{--                            <a href="{{$setting->url}}" class="youtube-popup video-btn">--}}
{{--                                <i class='bx bx-right-arrow'></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="widget widget-article mb-30">--}}
{{--                            <h3 class="sub-title">{{trans('app.destination')}}</h3>--}}
{{--                            @foreach($destinations as $destination)--}}
{{--                                <article class="article-item">--}}
{{--                                    <div class="image">--}}
{{--                                        <img src="assets/img/destination6.jpg" alt="Demo Image"/>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <span class="location"><i class='bx bx-map' ></i>{{$destination->name}}</span>--}}
{{--                                        <h3>--}}
{{--                                            <a href="destination-details.html">{{$destination->name}}.</a>--}}
{{--                                        </h3>--}}
{{--                                    </div>--}}
{{--                                </article>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </aside>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- end blog details section -->
@endsection
@section('js')
@endsection
