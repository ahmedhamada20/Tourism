@extends('front.layout.master')
@section('title')
    Your Order Invoice
@endsection
@section('css')
@endsection
@section('content')
    <style>
        .table td,
        .table th {
            padding: 0.5rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-size: 14px;
        }
    </style>
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('admin/pictures/trips/3/gallery_6.jpg') }}" alt=""
                            style="width: 200px;height: 60px">
                        <div class="row pb-2 p-2">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success">Print</button>
                            </div>
                            <h3 class="text-center" style="color: #0a53be">Review Your Order</h3>
                            <p class="mb-0"><strong>Invoice Date</strong>: 06-April-2020 20:30:34</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase small font-weight-bold">#</th>
                                        <th class="text-uppercase small font-weight-bold">package</th>
                                        <th class="text-uppercase small font-weight-bold">Price package</th>
                                        <th class="text-uppercase small font-weight-bold">Extra Total Price</th>
                                        <th class="text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @auth
                                    @if (auth()->user()->countries_id == 173)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $newCart_admin->package->name }}</td>
                                            <td>{{ $newCart_admin->package->price }}</td>
                                            <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                            <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $newCart_admin->total}}</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $newCart_admin->package->name }}</td>
                                            <td>{{ $newCart_admin->package->price }}</td>
                                            <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                            <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $newCart_admin->total}}</td>

                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $newCart_admin->package->name }}</td>
                                        <td>{{ $newCart_admin->package->price }}</td>
                                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal() + $newCart_admin->total}}</td>

                                    </tr>

                                @endauth
                                </tbody>
                            </table>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{$newCart_admin->id}}">
                                Check Out
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$newCart_admin->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> Check Out </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('order_store')}}" method="post">
                                                @csrf

                                                <input type="hidden" name="cart_id" value="{{$newCart_admin->id}}">
                                                <p class="text-danger">{{__('app.Check_Out')}}</p>
                                                @auth
                                                    @if (auth()->user()->countries_id == 173)
                                                        <input type="text" readonly class="form-control"
                                                               value="{{ (int) \Gloudemans\Shoppingcart\Facades\Cart::subtotal() +  $newCart_admin->total }}">
                                                    @else
                                                        <input type="text" readonly class="form-control"
                                                               value="{{ (int) \Gloudemans\Shoppingcart\Facades\Cart::subtotal() +  $newCart_admin->total}}">
                                                    @endif
                                                @else
                                                    <input type="text" readonly class="form-control"
                                                           value="{{ (int) \Gloudemans\Shoppingcart\Facades\Cart::subtotal() +  $newCart_admin->total}}">
                                                @endauth



                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Check Out</button>
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
        </div>

    </div>
@endsection
@section('js')
@endsection
