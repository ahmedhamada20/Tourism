@extends('front.layout.master')
@section('title')
    Privacy
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>Privacy</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">{{trans('app.home')}}</a></li>
                    <li class="item"><a ><i class='bx bx-chevrons-right'></i>Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('upload/image_home/' . $setting->image_home)}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->

    <!-- start blog details section -->
    <section class="blog-details-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc mb-30">
                        <div class="image mb-20">
                            <img src="{{asset('admin/pictures/privacyPolicy/' . $privacy->id .'/' .$privacy->photo->Filename)}}" alt="image" />
                        </div>
                        <ul class="info-list mb-20">
                            <li><i class='bx bx-calendar'></i> {{$privacy->created_at->diffforhumans()}}</li>
                            <li><i class='bx bx-tag' ></i>{{$privacy->name}}</li>
                        </ul>
                        <div class="content mb-20">
                            <p>
                                {!! $privacy->notes !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end blog details section -->
@endsection
@section('js')
@endsection
