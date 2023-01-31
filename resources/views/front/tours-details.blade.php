@extends('front.layout.master')
@section('title')
    {{$trip->name}} | Details | Unseen Egypt
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>{{$trip->name}}</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">Home</a></li>
                    <li class="item"><a href=""><i class='bx bx-chevrons-right'></i>{{$trip->name}}</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            @if($setting->photo)
                <img src="{{asset('admin/pictures/setting/' . $setting->id .'/' .$setting->photo->Filename)}}"
                     alt="Demo Image">
            @endif
        </div>
    </div>
    <section class="destinations-details-section pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$trip->name}}</h2>
                    </div>
                    <div class="col-md-3">
                        <p style="font-size: 12px">type :<span style="color: brown;font-weight: bold">{{$trip->TripsType->name}}</span></p>
                    </div>
                    <div class="col-md-3">
                        <p style="font-size: 12px">Reviews :<span style="color: brown;font-weight: bold">                                @for($i=0;$i<5;$i++)
                                    @if($trip->rate > $i)
                                        <i class='bx bxs-star'></i>
                                    @else
                                        <i class="simple-icon-star text-warning" aria-hidden="true"></i>
                                    @endif
                                @endfor</span></p>
                    </div>
                    <div class="col-md-3">
                        <p style="font-size: 12px">Destination :<span style="color: brown;font-weight: bold">{{$trip->destination->name}}</span></p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="destination-details-desc mb-30">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12">
                                <!--Slider-->
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                    <div class="carousel-indicators">
                                        @foreach($trip->photos as $slider)
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                    data-bs-slide-to="{{ $loop->index }}"
                                                    class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                                                    aria-label="Slide 1"></button>
                                        @endforeach
                                    </div>

                                    <div class="carousel-inner">
                                        @foreach($trip->photos as $slider)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img
                                                    src="{{asset('admin/pictures/trips/' . $trip->id .'/' .$slider->Filename)}}"
                                                    class="d-block w-100" alt="..."
                                                    style="white-space: 100%;height: 400px">
                                            </div>
                                        @endforeach
                                        <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <!-- End Slider-->
                        </div>
                    </div>
                    <div class="info-content">
                        <h3 style="font-weight: bold">Overview</h3>
                        <p>{!! $trip->notes !!}</p>
                        <h3 style="font-weight: bold">What's Included</h3>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($trip->included as $includ)
                                <p><i class="fa-solid fa-check" style="color: green"></i> {{$includ->name}} </p>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                @foreach($trip->excluded as $exclud)
                                <p><i class="fa-solid fa-xmark" style="color: red"></i> {{$exclud->name}} </p>
                                @endforeach
                            </div>
                        </div>
                        <h3 style="font-weight: bold">Please Note</h3>
                        <p>
                            @foreach($trip->MoreDtails as $note)
                                {!! $note->notes !!}
                            @endforeach
                        </p>
                    </div>
                    <h3 style="font-weight: bold">Additional Info</h3>
                    <div class="row">
                        @foreach($trip->additional as $additiona)
                        <div class="col-md-6">
                             <p> <i class="fa-solid fa-circle-info"></i> {{$additiona->name}}</p>
                        </div>
                        @endforeach
                    </div>
                    <h3 style="font-weight: bold">Cancellation Policy</h3>
                    <div class="row">
                        <div class="col-md-12" style="background-color: #cccccc;padding: 20px">
                            <p>
                                @foreach($trip->MoreDtails as $note)
                                    {!! $note->Cancellation !!}
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">

                    <div class="card">
                        <div class="card-header">
                            <i class="fa-brands fa-battle-net"></i> {{$trip->name}}
                        </div>
                        <div class="card-body">
                            <h3 style="font-weight: bold;color:brown"><i class="fa-solid fa-money-bill-1-wave"></i> {{trans('app.price')}}
                                : {{getPriceInCuracy($trip->price_adult_EN)}}
                                USD</h3>
                            <h3><i class="fa-solid fa-calendar-check"></i> {{trans('app.AvailableDays')}} :<br>
                                @forelse($trip->days as $row)
                                    <p style="display: inline;font-weight: bold;color:brown">{{$row->name}} - </p>
                                @empty
                                    <button type="button" class="btn btn-primary">متاحة جميع الايام</button>
                                @endforelse
                            </h3>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 date">
                                    <div class="input-group input-append date" id="datePicker" style="border:1px solid #cccccc">
                                        <span class="input-group-addon add-on"><span class="fa-solid fa-calendar-days" style="font-size: 50px;margin-left: 5px;margin-top: 5px"></span></span>
                                        <input type="text" class="form-control" name="date" placeholder="Select Date and Travelers"  />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="date form-group">
                                    <div class="input-group input-append date" id="datePicker" style="border:1px solid #cccccc">
                                        <span class="input-group-addon add-on"><span class="fa-solid fa-user" style="font-size: 30px;margin-left: 5px;margin-top: 10px"></span></span>
                                        <input type="number" class="form-control" name="date" placeholder="Adult" value="1"  />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="date form-group">
                                    <div class="input-group input-append date" id="datePicker" style="border:1px solid #cccccc">
                                        <span class="input-group-addon add-on"><span class="fa-solid fa-child-reaching" style="font-size: 30px;margin-left: 5px;margin-top: 10px"></span></span>
                                        <input type="number" class="form-control" name="date" placeholder="Child" value="1"  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr class="mt-2 mb-2">

                            </div>
                            <div class="col-md-12 text-center mt-3 mb-3">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-arrow-rotate-left"></i> Book Now</button>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="review" style="color: brown">
                                <span style="color: black;font-weight: bold">Rate : </span>
                                @for($i=0;$i<5;$i++)
                                    @if($trip->rate > $i)
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
                            @foreach($destinations as $destination)

                                <article class="article-item">
                                    <div class="image">
                                        @if($destination->photo)
                                            <img
                                                src="{{asset('admin/pictures/destenation/' . $destination->id .'/' .$destination->photo->Filename)}}"
                                                alt="Demo Image"/>
                                        @else
                                            <img src="{{asset('front/assets/img/destination6.jpg')}}" alt="Demo Image"/>
                                        @endif
                                    </div>
                                    <div class="content">
                                        <span class="location"><i class='bx bx-map'></i>{{$destination->name}}</span>
                                        <h3>
                                            <a
                                                href="{{route('user_destination_details',encrypt($destination->id))}}">{{$destination->name}}
                                                .</a>
                                        </h3>
                                    </div>
                                </article>

                            @endforeach
                        </div>
                    </aside>
                </div>


                <br>
                <div class="col-md-12">
                    <h3 style="font-weight: bold;text-align: center;margin-bottom: 1rem;margin-top: 1rem"> {{trans('app.PackageOptions')}}
                    </h3>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @forelse($trip->extras as $extra)
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
                                        @if($extra->price_person_en)
                                            <span class="col-md-4 mt-3" style="font-weight: bold">
                                            {{$extra->price_person_en}} / {{trans('app.perperson')}}
                                        </span>
                                        @endif
                                        @if($extra->price_group_en)
                                            <span class="col-md-4 mt-3" style="font-weight: bold">
                                            {{$extra->price_group_en}} / {{trans('app.pergroup')}}
                                        </span>
                                        @endif

                                        @if($cart->where('id', $extra->id)->count())
                                            <span class="col-md-4">
                                            <a href="" class="btn btn-primary">{{trans('app.select')}}</a>
                                        </span>
                                        @else
                                            <span class="col-md-4">
                                            <a href="" class="btn btn-primary">{{trans('app.selected')}}</a>
                                        </span>
                                        @endif
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
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <p>
                                                        {!! $extra->notes !!}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input type="number" name="quantity" value="1"
                                                               placeholder="Quantity" class="form-control"
                                                               style="border: 1px solid;">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="extra_id" value="{{ $extra->id }}">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary mt-1">Add To Cart
                                                    </button>
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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="font-weight: bold">My Cart</h3>
                            </div>
                            <table class="table table-cart">
                                <thead>
                                <tr>
                                    <th class="product-col">{{trans('app.ExtraName')}}</th>
                                    <th class="price-col">{{trans('app.price_one')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cart as $row )

                                    <tr class="product-row">
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                <a href="#">{{App\Models\Extra::where('id',$row->id)->pluck('name')}}</a>
                                            </h3>
                                        </td>
                                        <td>{{ $row->price }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="card-body">
                                <span style="font-weight: bold">Cart Items :</span> {{ Cart::content()->count() }}
                            </div>
                            <div class="card-footer">
                                <span style="font-weight: bold">Cart Total :</span> {{ Cart::subtotal() }}


                                <a href="{{ route('user_trips_info',encrypt($trip->id)) }}" class="btn btn-primary">Check
                                    Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end blog details section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#datePicker')
                .datepicker({
                    format: 'mm/dd/yyyy'
                })
                .on('changeDate', function(e) {
                    // Revalidate the date field
                    $('#eventForm').formValidation('revalidateField', 'date');
                });

            $('#eventForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The name is required'
                            }
                        }
                    },
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'The date is required'
                            },
                            date: {
                                format: 'MM/DD/YYYY',
                                message: 'The date is not a valid'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
