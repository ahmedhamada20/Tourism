@extends('front.layout.master')
@section('title')
    {{trans('app.destination')}}
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Tours</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">{{trans('app.home')}}</a></li>
                    <li class="item"><a ><i class='bx bx-chevrons-right'></i>{{trans('app.destination')}}</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('front/assets/img/page-title-area/tour.jpg')}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->
    <!-- start our tours section -->
    <section id="tours" class="tours-section tours-style-two ptb-100 bg-light">
        <div class="container">
            <div class="section-title">

            <div class="row">
                 @foreach (App\Models\Trips::where('destination_id',$destin->id)->get() as $trip )
                <div class="col-lg-4 col-md-6">
                    <div class="item-single mb-30">
                        <div class="image">
                            @if($trip->photo)
                            <img src="{{asset('admin/pictures/trips/' . $trip->id .'/' .$trip->photo->Filename)}}" alt="Demo Image"/>
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
                                <li>${{getPriceInCuracy($trip->price_adult_EN)}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 col-md-12">
                    <div class="pagination text-center">
                        {{ $trips->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end our tour section -->
@endsection
@section('js')
@endsection
