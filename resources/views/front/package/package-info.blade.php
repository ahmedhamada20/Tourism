@extends('front.layout.master')
@section('title')
    Tour Information
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Tour Information</h1>
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
                        <input type="hidden" name="packageOrderRequest" value="20">
                        <input type="hidden" name="package_id" value="{{ $trip->id }}">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Your Name</label>
                                    <input type="text" class="form-control" name="name_user" placeholder="Your Name" required style="border: 1px solid;padding-bottom: 1.5rem">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Your Email</label>
                                    <input type="email" class="form-control" name="name_email" placeholder="Your Email" required style="border: 1px solid;padding-bottom: 1.5rem">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Your Phone</label>
                                    <input type="number" class="form-control" name="name_phone" placeholder="Your Phone" required style="border: 1px solid;padding-bottom: 1.5rem">
                                </div>
                            </div>
                            
                            <div class="col">
                            <div class="form-group">
                                <label for="">country code</label>
                                <input type="number" required class="form-control" name="country_code" placeholder="country code"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" required class="form-control" name="Nationality" placeholder="Nationality"
                                    required style="border: 1px solid;padding-bottom: 1.5rem">
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="form-group">
                                <label for="">Preferred Language</label>
                               <select class="form-control p-1" name="status" required>
                                <option value="" disabled selected>-- Choose --</option>
                                @foreach (App\Models\Prelang::all() as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                           
                        </div>
                        <hr>
                        <div class="row">
                            <h3>Operation Information</h3>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Your Hotel Name</label>
                                    <input type="text" class="form-control" name="user_airline" placeholder="Your Hotel Name" required style="border: 1px solid;padding-bottom: 1.5rem">
                                </div>
                            </div>

                            <div class="col">
                                <label>Adulte</label>
                                <input class="form-control" type="number" name="adulte" value="0" style="border:1px solid">
                            </div>
                            <div class="col">
                                <label>Chiled</label>
                                <input class="form-control" type="number" name="chiled" value="0" style="border:1px solid">
                            </div>
                            <div class="col">
                                <label>Date</label>
                                <input class="form-control" type="date" name="date" value="0" style="border:1px solid">
                            </div>
                            <div class="col">
                                <label>Time</label>
                                <input class="form-control" type="time" name="time" value="0" style="border:1px solid">
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
