@extends('front.layout.master')
@section('title')
{{$transfer->name}} | Details | Unseen Egypt
@endsection
@section('css')
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="page-title-area ptb-100">
    <div class="container">
        <div class="page-title-content">
            <h1>{{$transfer->name}}</h1>
            <ul>
                <li class="item"><a href="{{route('home')}}">Home</a></li>
                <li class="item"><a href=""><i class='bx bx-chevrons-right'></i>{{$transfer->name}}</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-image">
        @if($setting->photo)
        <img src="{{asset('admin/pictures/setting/' . $setting->id .'/' .$setting->photo->Filename)}}" alt="Demo Image">
        @endif
    </div>
</div>
<section class="destinations-details-section pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>{{$transfer->name}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="destination-details-desc mb-30">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-sm-12">
                            <!--Slider-->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                @foreach($sliders as $slider)
                                <div class="carousel-inner">
                                    @foreach($slider->photos as $row)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{asset('admin/pictures/transfer/' . $slider->id .'/' .$row->Filename)}}"
                                            class="d-block w-100" alt="..." style="white-space: 100%;height: 400px">
                                    </div>
                                    @endforeach
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Slider-->
                    </div>
                </div>
                <div class="info-content">
                    <p>{!! $transfer->notes !!}</p>
                </div>

            </div>

            <div class="col-lg-4 col-md-4">

                <div class="card">
                    <div class="card-header">
                        {{$transfer->name}}
                    </div>
                    <div class="card-body">
                        <h3 style="font-weight: bold">Tour Price: {{getPriceInCuracy($transfer->price_EN)}}
                            USD</h3>
                        <h3>Available Days :<br>
                           
                            <p style="display: inline;font-weight: bold">Route Form ::{{$transfer->route_form}}  </p><br>
                            <p style="display: inline;font-weight: bold">Route To :: {{$transfer->route_to}}  </p>
                           
                         
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="review" style="color: gold">
                            <span style="color: black;font-weight: bold">Rate : </span>
                            @for($i=0;$i<5;$i++) @if($transfer->rate > $i)
                                <i class='bx bxs-star'></i>
                                @else
                                <i class="simple-icon-star text-warning" aria-hidden="true"></i>
                                @endif
                                @endfor
                        </div>
                    </div>
                </div>


                <aside class="widget-area">
                    <div class="widget widget-search mb-30">
                    </div>
                    <div class="widget widget-article mb-30">
                        <h3 class="sub-title">{{trans('app.destination')}}</h3>
                        @foreach($sliders_trans as $destination)

                        <article class="article-item">
                            <div class="image">
                                @if($destination->photo)
                                <img src="{{asset('admin/pictures/transfer/' . $destination->id .'/' .$destination->photo->Filename)}}"
                                    alt="Demo Image" />
                                @else
                                <img src="{{asset('front/assets/img/destination6.jpg')}}" alt="Demo Image" />
                                @endif
                            </div>
                            <div class="content">
                                <span class="location"><i class='bx bx-map'></i>{{$destination->name}}</span>
                                {{-- <h3>
                                    <a
                                        href="{{route('user_destination_details',encrypt($destination->id))}}">{{$destination->name}}.</a>
                                </h3> --}}
                            </div>
                        </article>

                        @endforeach
                    </div>
                </aside>
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-weight: bold">My Cart</h3>
                    </div>
                    <div class="card-body">
                        <span style="font-weight: bold">Cart Items :</span> {{ Cart::content()->count() }}
                    </div>
                    <div class="card-footer">
                        <span style="font-weight: bold">Cart Total :</span> {{ Cart::subtotal() }}
                        <a href="{{ route('user_transfer_cart',encrypt($transfer->id)) }}" class="btn btn-primary">Check Out</a>
                    </div>
                </div>
            </div>

            <br>
            <div class="col-md-12">
                <h3 style="font-weight: bold;text-align: center;margin-bottom: 1rem;margin-top: 1rem"> Package
                    Options
                </h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @forelse($transfer->extras as $extra)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed"
                                style="border: 1px solid; text-align: center !important;" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$extra->id}}"
                                aria-expanded="false" aria-controls="flush-collapseOne">
                                <span class="container">
                                    <span class="row">
                                        <span class="col-md-4 mt-3" style="font-weight: bold">
                                            {{$extra->name}}
                                        </span>
                                        <span class="col-md-4 mt-3" style="font-weight: bold">
                                            {{$extra->price_person_en}} / Per Person
                                        </span>
                                        <span class="col-md-4">
                                            <a href="" class="btn btn-primary">Select</a>
                                        </span>
                                    </span>
                                </span>

                            </button>
                        </h2>


                        <div id="flush-collapseOne{{$extra->id}}" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                @if($cart->where('id', $extra->id)->count())
                                <form action="{{ route('deleted.cart',$extra->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Deleted Cart</button>
                                </form>
                                @else
                                <form action="{{ route('cart.transfer') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p>
                                                {!! $extra->notes !!}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" name="quantity" value="1" placeholder="Quantity" class="form-control" style="border: 1px solid;">
                                            </div>
                                        </div>
                                        <input type="hidden" name="extra_id" value="{{ $extra->id }}">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary mt-1">Add To Cart</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end blog details section -->
@endsection
@section('js')
@endsection
