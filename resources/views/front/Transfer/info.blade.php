@extends('front.layout.master')
@section('title')
Transfer Information
@endsection
@section('css')
@endsection
@section('content')
<!-- start page title area-->
<div class="page-title-area ptb-100">
    <div class="container">
        <div class="page-title-content">
            <h1>Transfer Information</h1>
            <ul>
                <li class="item"><a href="{{route('home')}}">Home</a></li>
                <li class="item"><a><i class='bx bx-chevrons-right'></i>Tour Information</a></li>
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
<section id="cart" class="cart-section pt-100 pb-70">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: bold">Your Information</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cart_store') }}" method="post">
                    @csrf
                    <input type="hidden" name="transferOrderRequest" value="3">
                    <input type="hidden" name="transfer_id" value="{{ $trip->id }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Your Name</label>
                                <input type="text" class="form-control" name="name_user" placeholder="Your Name"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Your Email</label>
                                <input type="email" class="form-control" name="name_email" placeholder="Your Email"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Your Phone</label>
                                <input type="number" class="form-control" name="name_phone" placeholder="Your Phone"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Your Nationality</label>
                                <select class="form-select" aria-label="Default select example" name="" required
                                    style="border: 1px solid;padding-bottom: 1.5rem">
                                    <option selected>Choose Nationality</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    <hr>
                    <div class="row">
                        <h3>Please give us your arrival flight details</h3>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Your Hotel Name</label>
                                <input type="text" class="form-control" name="user_airline"
                                    placeholder="Your Hotel Name" required
                                    style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">data</label>
                                <input type="date" class="form-control" name="user_date" placeholder="Your data"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">time</label>
                                <input type="time" class="form-control" name="user_time" placeholder="Your time"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">Submit Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
@endsection