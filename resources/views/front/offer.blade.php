@extends('front.layout.master')
@section('title')
    {{trans('app.package')}}
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Offers & Discount</h1>
                <ul>
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href="special-offers.html"><i class='bx bx-chevrons-right'></i>Special Offers</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('admin/pictures/setting/' . $setting->id .'/' .$setting->photo->Filename)}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->
    <!-- start offers section -->
    <section id="offers" class="offers-section ptb-100 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Special Offers & Discount</h2>
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
                                    <span>${{getPriceInCuracy($package->before_price)}}</span>
                                </div>
                                <ul class="list">
                                    <li>${{getPriceInCuracy($package->price)}}</li>
                                </ul>
                            </div>
                            <div class="discount">
                                <span>Discount</span>
                                <span>{{getPriceInCuracy($package->before_price) - getPriceInCuracy($package->price)}} $</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-md-12">
                    <div class="pagination text-center">
                        {{ $packages->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end offers section -->
@endsection
@section('js')
@endsection
