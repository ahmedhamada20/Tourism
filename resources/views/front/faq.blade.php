@extends('front.layout.master')
@section('title')
    FAQ
@endsection
@section('css')
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>FAQ</h1>
                <ul>
                    <li class="item"><a href="{{route('home')}}">Home</a></li>
                    <li class="item"><a href="faq.html"><i class='bx bx-chevrons-right'></i>FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{asset('upload/image_home/' . $setting->image_home)}}" alt="Demo Image">
        </div>
    </div>
    <!-- end page title area -->

    <!-- start faq section -->
    <section class="faq-section ptb-100 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>FAQ</h2>
                <p>{{__('app.faq')}}</p>
            </div>
            <div class="panel-group" id="accordion">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($QuestionsAnswers as $QuestionsAnswer)
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse1{{$QuestionsAnswer->id}}">
                                          {{$QuestionsAnswer->name}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1{{$QuestionsAnswer->id}}" class="panel-collapse collapse" data-bs-parent="#accordion">
                                    <div class="panel-body">
                                        <p> {!! $QuestionsAnswer->notes!!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end faq section  -->
@endsection
@section('js')
@endsection
