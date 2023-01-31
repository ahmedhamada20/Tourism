@extends('front.layout.master')
@section('title')
{{trans('app.checkout')}}
@endsection
@section('css')
@endsection
@section('content')
<!-- start page title area-->
<div class="page-title-area ptb-100">
    <div class="container">
        <div class="page-title-content">
            <h1>{{trans('app.checkout')}}</h1>
            <ul>
                <li class="item"><a href="{{route('home')}}">{{trans('app.home')}}</a></li>
                <li class="item"><a><i class='bx bx-chevrons-right'></i>{{trans('app.checkout')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-image">
        @if($setting->photo)
        <img src="{{asset('admin/pictures/setting/' . $setting->id .'/' .$setting->photo->Filename)}}" alt="Demo Image">
        @endif
    </div>
</div>
<!-- end page title area -->
<!-- start cart section -->
<section id="cart" class="cart-section pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    {{-- <form action="{{ route('cart_store') }}" method="post">
                        @csrf

                        <input type="hidden" name="tripsOrderRequest" value="8">
                        <input type="hidden" name="trips_id" value="{{ $trip->id }}">
                    

                    </form> --}}
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">{{trans('app.itemName')}}</th>
                                <th class="price-col">{{trans('app.price')}}</th>
                                <th class="price-col">Price</th>
                                <th>{{trans('app.Subtotal')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="product-row">
                                <td class="product-col">
                                    @if($trip->photo)
                                    <figure class="product-image-container">
                                        <a class="product-image">
                                            <img src="{{asset('admin/pictures/package/' . $trip->id .'/' .$trip->photo->Filename)}}"
                                                alt="product">
                                        </a>
                                    </figure>
                                    @endif

                                    <h3 class="product-title">
                                        <a>{{ $trip->name }}</a>
                                    </h3>
                                </td>
                                
                                <td>{{ $trip->price}}</td>

                                                                                          <td>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Cash Payment
                                  </label>
                                </div>
                            </td>
                                                            <td>{{ $trip->price + Cart::subtotal()}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">{{trans('app.ExtraName')}}</th>
                                <th class="price-col">{{trans('app.price')}}</th>

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
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>{{trans('app.Summary')}}</h3>

                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>{{trans('app.Subtotal')}}</td>
                                <td>{{ $trip->price + Cart::subtotal()}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>{{trans('app.OrderTotal')}}</td>
                                <td>{{ $trip->price + Cart::subtotal()}}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{ route('user_package_info',encrypt($trip->id)) }}" class="btn btn-block btn-sm btn-primary">{{trans('app.checkout')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end cart section -->
@endsection
@section('js')
@endsection