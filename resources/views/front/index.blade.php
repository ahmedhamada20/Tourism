@extends('front.layout.master')
@section('title')
{{trans('app.home')}}
@endsection
@section('css')
<style>
    .lang-switcher span {
  vertical-align: middle;
  font-size: 1.66667rem;
  color: #fff; }
  .lang-switcher span:first-child {
    margin-bottom: 10px;
    line-height: 1; }

.lang-switcher .switcher {
  height: 18px;
  width: 45px;
  background: #fff;
  display: inline-block;
  border-radius: 50px;
  vertical-align: middle;
  margin: 0 8px;
  position: relative;
  cursor: pointer; }
  .lang-switcher .switcher:after {
    content: "";
    width: 22px;
    height: 22px;
    background: #BF2928;
    border-radius: 50%;
    display: block;
    position: absolute;
    top: -2px;
    right: 0; }

</style>
@endsection
@section('content')
    <!-- start home banner area -->
    <div id="home" class="home-banner-area home-style-three">
        <div class="container-fluid p-0">

{{--             
<div class="lang-switcher d-md-flex justify-content-md-between align-items-md-center">
    <span>ع</span>
    <a href="#" class="switcher" onclick="CheckLanguage()"></a>
    <span>EN</span>
</div> --}}

            <div class="banner-slider-three owl-carousel">
                @foreach($sliders as $slider)

                <div class="slider-item" style="background: url({{asset('upload/slider/'.$slider->image)}}) no-repeat center center fixed ;">
                    <div class="container">
                        <div class="banner-content">
                            <h1>
                                {{$slider->name}}
                            </h1>
                            <p>
                                {{Str::limit($slider->notes, 200)}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="container mb-10">
                <div class="row">
                    <div class="col-xs-12 search-form">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{trans('app.trips')}}</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{trans('app.transfer')}}</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="">
                                    <form id="searchForm" action="{{route('trips')}}" method="post">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="select-box">
                                                            <i class='bx bx-map-alt'></i>
                                                            <select class="form-control text-black" id="inputGroupSelect01" name="destination_id" required>
                                                                <option value="" selected disabled>{{trans('app.destination')}}</option>
                                                                @foreach(App\Models\Destenation::get() as $row)
                                                                    <option value="{{$row->id}}" >{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="select-box">
                                                            <i class='bx bx-tours'></i>
                                                            <input type="text" class=" form-control text-black" placeholder="{{trans('app.tours_name')}}" name="name"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="select-box">
                                                            <i class='bx bx-calendar'></i>
                                                            <select class="form-control text-black" name="days">
                                                                <option value="" selected disabled>{{trans('app.av_day')}}</option>
                                                                @foreach(App\Models\Day::get() as $row)
                                                                    <option value="{{$row->id}}" >{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn-search">
                                                    <i class='bx bx-search-alt'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="">
                                    <form  action="{{route('transfer_result')}}" method="post" id="searchForm">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-lg-11">
                                                <div class="row">
{{--                                                    <div class="col-lg-3 wrapper ">--}}
{{--                                                            <select class="custom-select w-100" name="destenation_id_row" id="destenation_id_row">--}}
{{--                                                                <option data-display='Destination'>Nothing</option>--}}
{{--                                                            @foreach(App\Models\Destenation::get() as $row)--}}
{{--                                                                    <option value="{{$row->id}}" >{{$row->name}}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            </select>--}}
{{--                                                    </div>--}}
                                                    <div class="col-lg-3 ">
                                                        <div class="select-box">
                                                            <i class='bx bx-map-alt' ></i>
                                                            <select class="form-control text-black" name="destenation_id_row" id="destenation_id_row">
                                                                <option data-display='Destination' selected>
                                                                    {{trans('app.destination')}}</option>
                                                                @foreach(App\Models\Destenation::get() as $row)
                                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="select-box text-black">
                                                            <i class='bx bx-calendar'></i>
                                                            <input type="text" class="date-select form-control text-black" placeholder="{{trans('app.check_date')}}" required="required"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 ">
                                                        <div class="select-box">
                                                            <i class='bx bx-package'></i>
                                                            <select class="form-control text-black" name="route_form"  id="route_form">
                                                                <option value="" disabled selected>{{trans('app.route_from')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="select-box">
                                                            <i class='bx bx-package'></i>
                                                            <select class="form-control text-black" name="route_to">
                                                                <option value="" disabled selected>{{trans('app.route_to')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn-search">
                                                    <i class='bx bx-search-alt'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home banner area -->
    <!-- start features section -->
    <section class="features-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                @foreach($calls as $call)
                <div class="col-lg-4 col-md-6">
                    <div class="item-single mb-30">
                        {!! $call->icon !!}
                        <h3><a href="#">{{$call->name}}</a></h3>
                        <p>{!!Str::limit($call->notes, 100)!!}</p>
                        <div class="cta-btn">
                            <a href="#" class="btn-primary">{{trans('app.read_more')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end features section -->
    <!-- start destination section -->
    <section id="destination" class="destination-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>{{trans('app.destination')}}</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>

            <div class="row filtr-container">
                @foreach($destinations as $destination)
                <div class="col-lg-4 col-md-6 filtr-item mb-5" data-category="1" data-sort="value">
                    <div class="item-single mb-30">
                        <div class="image">
                            @if($destination->photo)
                            <img src="{{asset('admin/pictures/destenation/' . $destination->id .'/' . $destination->photo->Filename)}}" alt="Demo Image" style="height: 300px">
                            @endif
                        </div>
                        <div class="content">
                            <span class="location"><i class='bx bx-map' ></i>{{$destination->name}}</span>
                            <h3>
                                <a href="{{route('user_destination',encrypt($destination->id))}}">{{$destination->name}}</a>
                            </h3>
                            <p>
                                {!! Str::limit($destination->note, 100) !!}
                            </p>
                            <hr>
{{--                            <ul class="list">--}}
{{--                                <li><i class='bx bx-group'></i>{{getCountTrips($destination->id)}} /{{trans('app.trip')}}</li>--}}
{{--                            </ul>--}}
                        </div>
                        <div class="spacer"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end destination section -->
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
                                    {{$about->notes}}.
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
                            <a href="#" class="btn-primary">{{trans('app.read_more')}}</a>
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
    <!-- start offers section -->
    <section id="offers" class="offers-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>{{trans('app.offer')}}</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row">
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6">
                    <div class="item-single mb-30">
                        <div class="image">
                            @if($package->photo)
                            <img src="{{asset('admin/pictures/package/' . $package->id .'/' .$package->photo->Filename)}}" alt="Demo Image">
                            @endif
                        </div>
                        <div class="content">
                            <div class="review">
                                @for($i=0;$i<5;$i++)
                                    @if($package->rate > $i)
                                        <i class='bx bxs-star'></i>
                                    @else
                                        <i class="simple-icon-star text-warning"
                                           aria-hidden="true"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{route('package_details',encrypt($package->id))}}">{{$package->name}}</a>
                                </h3>
                                <span>${{$package->before_price}}</span>
                            </div>
                            <ul class="list">
                                <li> {{getPriceInCuracy($package->price)}} </li>
                            </ul>
                        </div>
                        <div class="discount">
                            <span>{{trans('app.discount')}}</span>
                            <span>{{getPriceInCuracy($package->before_price) - getPriceInCuracy($package->price)}} $</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end offers section -->
    <!-- start video section -->
    @if($setting->photo)
        <div id="video" class="video-section" style="background: url({{asset('upload/image_home/' . $setting->image_home)}}) no-repeat center;background-size: cover;">
        @endif
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="video-content">
                        <a href="{{$setting->url}}" class="youtube-popup video-btn">
                            <i class='bx bx-right-arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end video section -->
    <!-- start tours section -->
    <section id="tours" class="tours-section pt-100 pb-70 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>{{trans('app.trips')}}</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row no-wrap">
                <div class="col-auto">
                    <div class="item-single mb-30">
                        <div class="image">
                            @if($trip_1->photo)
                                <img src="{{asset('admin/pictures/trips/' . $trip_1->id .'/' .$trip_1->photo->Filename)}}" alt="Demo Image" style="height: 500px;width: 450px"/>
                            @endif
                        </div>
                        <div class="content">
                            <span class="location"><i class='bx bx-map' ></i>{{$trip_1->destination->name}}</span>
                            <h3>
                                <a href="{{route('user_trips_details',encrypt($trip_1->id))}}">{{$trip_1->name}}</a>
                            </h3>
                            <div class="review mb-15">
                                @for($i=0;$i<5;$i++)
                                    @if($trip_1->rate > $i)
                                        <i class='bx bxs-star'></i>
                                    @else
                                        <i class="simple-icon-star text-warning"
                                           aria-hidden="true"></i>
                                    @endif
                                @endfor
                            </div>
                            <p>
                            {!!Str::limit($trip_1->notes, 50)!!}
                            <hr>
                            <ul class="list">
                                <li><i class='bx bx-time'></i>
                                    @foreach($trip_1->days as $row)
                                       - {{$row->name}}
                                    @endforeach
                                </li>
                                <li>${{getPriceInCuracy($trip_1->price_adult_EN)}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-md-12">
                    <div class="tours-slider owl-carousel mb-30">
                        @foreach($trips as $trip)
                        <div class="slider-item">
                            <div class="image">
                                @if($trip->photo)
                                    <img src="{{asset('admin/pictures/trips/' . $trip->id .'/' .$trip->photo->Filename)}}" alt="Demo Image" style="height: 350px"/>
                                @endif
                            </div>
                            <div class="content">
                                <div class="review">
                                    @for($i=0;$i<5;$i++)
                                        @if($trip->rate > $i)
                                            <i class='bx bxs-star'></i>
                                        @else
                                            <i class="simple-icon-star text-warning"
                                               aria-hidden="true"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div class="title">
                                    <h3>
                                        <a href="{{route('user_trips_details',encrypt($trip->id))}}">{{$trip->name}}</a>
                                    </h3>
                                </div>
                                <ul class="list">
                                    <li><i class='bx bx-time'></i>
                                        @foreach($trip->days as $row)
                                            - {{$row->name}}
                                        @endforeach</li>
                                    <li>{{getPriceInCuracy($trip->price_adult_EN)}}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end tour section -->


@foreach($transfers as $transfer)
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>{{trans('app.transfer')}}</h2>
                    <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
                </div>
                <div class="col-md-12">
                    <div class="card w-100">
                        <div class="row">
                            <div class="col-4">
                                                                 @if($transfer->photo)

                                <a href=""><img src="{{asset('admin/pictures/transfer/' . $transfer->id .'/' .$transfer->photo->Filename)}}" alt="" class="transfer-img" style="width:300px;height:300px"></a>
                                @else
                                <a href=""><img src="{{asset('front/assets/img/car.jpg')}}" alt="" class="transfer-img" ></a>
                                @endif
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <a href="" class="tours-h"><h5 class="card-title tours-h">{{$transfer->name}}</h5></a>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn-primary">{{getPriceInCuracy($transfer->price_EN_go)}}</button>
                                        </div>
                                    </div>

                                    <p class="card-text">
                                        {!!Str::limit($transfer->notes,150)!!}
                                    </p>
                                    <div class="row mb-3">
                                        <div class="col-md-6 text-black"><i class="fa-solid fa-route" style="color: #fd5056"></i><span style="font-weight: bold">{{trans('app.route_from')}}:</span>  {{$transfer->route_form}}</div>
                                        <div class="col-md-6 text-black"><i class="fa-solid fa-route" style="color: #fd5056"></i><span style="font-weight: bold"> {{trans('app.route_to')}} :</span>
                                            {{$transfer->route_to}}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 text-black">
                                            <i class="fa-solid fa-angles-right" style="color: #fd5056"></i><span style="font-weight: bold"> {{trans('app.car_name')}} :</span>  {{$transfer->car_name}}
                                        </div>
                                        <div class="col-md-4 text-black">
                                            <i class="fa-solid fa-angles-right" style="color: #fd5056"></i><span style="font-weight: bold"> {{trans('app.car_type')}} :</span> {{$transfer->car_type}}
                                        </div>
                                        <div class="col-md-4 text-black">
                                            <i class="fa-solid fa-angles-right" style="color: #fd5056"></i> <span style="font-weight: bold">{{trans('app.car_model')}} :</span> {{$transfer->car_model}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="accordion accordion-flush mb-2 col-md-12" id="accordionFlushExample" >
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
                                    <div class="col-md-12 d-grid gap-2">
                                        <a href="{{route('user_transfer_details',encrypt($transfer->id))}}" class="btn btn-primary">{{trans('app.book_now')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endforeach




    <!-- start blog section -->
    <section id="blog" class="blog-section pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{trans('app.blog')}}</h2>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($blog_1)
                        <div class="item-single item-big mb-30">
                            @if($blog_1->photo)
                            <div class="image">
                                <img src="{{asset('admin/pictures/blog/' . $blog_1->id .'/' .$blog_1->photo->Filename)}}" alt="Demo Image"/>
                            </div>
                            @endif
                            <div class="content">
                                <ul class="info-list">
                                    <li><i class='bx bx-calendar'></i> {{$blog_1->created_at->diffforhumans()}}</li>
                                </ul>
                                <h3>
                                    <a href="{{route('user_blog_details',encrypt($blog_1->id))}}">{{$blog_1->name}}</a>
                                </h3>
                                <p>
                                    {!! str::limit($blog_1->notes,200) !!}
                                </p>
                                <ul class="list">
                                    <li>
                                        <a href="{{route('user_blog_details',encrypt($blog_1->id))}}" class="btn-primary">{{trans('app.read_more')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6">
                            <div class="item-single mb-30">
                                @if($blog->photo)
                                <div class="image">
                                    <img src="{{asset('admin/pictures/blog/' . $blog->id .'/' .$blog->photo->Filename)}}" alt="Demo Image"/>
                                </div>
                                @endif
                                <div class="content">
                                    <ul class="info-list">
                                        <li><i class='bx bx-calendar'></i>{{$blog->created_at->diffforhumans()}}</li>
                                    </ul>
                                    <h3>
                                        <a href="{{route('user_blog_details',encrypt($blog->id))}}">{{$blog->name}}</a>
                                    </h3>
                                    <ul class="list">
                                        <li>
                                            <div class="author">
                                                <a href="{{route('user_blog_details',$blog->id)}}" class="btn-primary">{{trans('app.read_more')}}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end blog section -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('select[name="destenation_id_row"]').on('change', function () {
            var SectionId = $(this).val();
            if (SectionId) {
                $.ajax({
                    url: "{{ URL::to('route_form') }}/" + SectionId
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('select[name="route_form"]').empty();
                        $('select[name="route_form"]').append('<option selected disabled >{{trans('app.route_from')}}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="route_form"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                    ,
                });

            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('select[name="destenation_id_row"]').on('change', function () {
            var SectionId = $(this).val();
            if (SectionId) {
                $.ajax({
                    url: "{{ URL::to('route_to') }}/" + SectionId
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('select[name="route_to"]').empty();
                        $('select[name="route_to"]').append('<option selected disabled >{{trans('app.route_to')}}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="route_to"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                    ,
                });

            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script type="text/javascript">
    function CheckLanguage() {
        debugger;
        if (window.location.href.toLowerCase().indexOf("/en") > -1) {
            window.location.href = window.location.href.toLowerCase().replace('/en', '/ar');
        } else if (window.location.href.toLowerCase().indexOf("/ar") > -1) {
            window.location.href = window.location.href.toLowerCase().replace('/ar', '/en');

        } else {

            window.location.href = window.location.origin + '/en' + window.location.pathname;

        }
    }
</script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
