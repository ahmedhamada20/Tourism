@extends('front.layout.master')
@section('title')
    {{trans('app.transfer')}}
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>{{trans('app.transfer')}}</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">{{trans('app.home')}}</a></li>
                    <li class="item"><a ><i class='bx bx-chevrons-right'></i>{{trans('app.transfer')}}</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
                    @if($setting->photo)
        <img src="{{asset('upload/image_transfer/' .$setting->image_transfer)}}" alt="Demo Image">
        @endif
        </div>
    </div>
    <!-- end page title area -->

        <section>
            <div class="container mt-5">
                @foreach($transfers as $transfer)
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
                                        {!! Str::limit($transfer->notes,150) !!}
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
                @endforeach
            </div>

        </section>

@endsection
@section('js')
@endsection
