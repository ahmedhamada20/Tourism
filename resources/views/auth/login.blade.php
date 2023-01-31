@extends('front.layout.master')
@section('title')
    {{trans('app.login')}}
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>{{trans('app.login')}}</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">{{trans('app.home')}}</a></li>
                    <li class="item"><a href="{{route('login')}}"><i class='bx bx-chevrons-right'></i>{{trans('app.login')}}</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('admin/pictures/trips/3/gallery_6.jpg/')}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->

    <!-- start authentication area -->
    <div class="authentication-section">
        <div class="container">
            <div class="main-form ptb-100">
                <form id="#authForm" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="content">
                        <h3>{{trans('app.welcome')}}</h3>
                        <p>{{trans('app.login_disc')}}</p>
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class='bx bx-user'></i></div>
                        <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="form-group">
                        <div class="input-icon"><i class='bx bx-at'></i></div>
                        <input type="password" class="form-control" placeholder="Your Password" name="password" required>
                    </div>
                    <div class="row align-items-center mb-30">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="checkbox">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">
                        {{trans('app.login')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- end authentication section -->
@endsection
@section('js')
@endsection
