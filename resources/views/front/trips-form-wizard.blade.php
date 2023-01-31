@extends('front.layout.master')
@section('title')
    Check Out Details
@endsection
@section('css')
    <link href="{{asset('front/assets/css/bootstrap1.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('front/assets/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/vendor/date-picker/css/datepicker.min.css')}}">
    <link href="{{asset('front/assets/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div >
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">


                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">{{trans('app.extra')}}</a></li>
                                    <li><a href="#account" data-toggle="tab">{{trans('app.client_info')}}</a></li>

                                </ul>

                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">

                                        <livewire:trips :trips="$trips" />
                                    </div>



                                    <div class="tab-pane" id="account">
                                        <h4 class="info-text"> {{trans('app.join')}} </h4>


                                        @auth
                                            <form action="{{ route('cart_store') }}" method="POST" autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="tripsOrderRequest" value="8">
                                                <input type="hidden" value="{{$trips->id}}" name="trips_id">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ auth()->user()->name }}" name="name_user">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" readonly
                                                                value="{{ auth()->user()->email }}" name="name_email">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" readonly
                                                                value="{{ auth()->user()->phone }}" name="name_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ auth()->user()->countries->name }}"
                                                                name="user_countries_id">
                                                        </div>
                                                    </div>
                                                    <hr class="mt-3">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="user_notes" id="" required="required" class="form-control" cols="30" rows="10"
                                                                placeholder="Notes"></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="wizard-footer height-wizard">
                                                    <div class="pull-right mt-3">

                                                        <button type="submit"
                                                            class="btn btn-success btn-fill btn-wd btn-sm">{{trans('app.confirm')}}</button>

                                                    </div>

                                                </div>



                                            </form>
                                        @else
                                            <form action="{{ route('cart_store') }}" method="POST" autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="tripsOrderRequest" value="8">
                                                <input type="hidden" value="{{$trips->id}}" name="trips_id">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" required
                                                                name="name_user" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" required="required"
                                                                name="name_email" placeholder="Email Address">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control"  placeholder="Phone" required name="name_phone">
                                                        </div>
                                                    </div>

                                                    <hr class="mt-3">



                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea name="user_notes" required="required" id="" class="form-control" cols="30" rows="10"
                                                                placeholder="Notes"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="wizard-footer height-wizard">
                                                    <div class="pull-right mt-3">

                                                        <button type="submit"
                                                            class="btn btn-fill btn-success btn-wd btn-sm">{{trans('app.confirm')}}</button>

                                                    </div>

                                                </div>

                                            </form>
                                        @endauth


                                    </div>

                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right mt-3">
                                            <input type='button' class='btn btn-next btn-fill btn-info btn-wd'
                                                name='next' value='{{trans('app.next')}}' />

                                            {{-- <input type='button'
                                                class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish'
                                                value='Finish' /> --}}
                                        </div>
                                        <div class="pull-left">
                                            <input type='button'
                                                class='btn btn-previous btn-fill btn-warning btn-wd btn-sm'
                                                name='previous' value='{{trans('app.previous')}}' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> <!-- wizard container -->
                        </div>
                    </div><!-- end row -->
                </div> <!--  big container -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('front/assets/js/bootstrap1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('front/assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="{{asset('front/assets/js/gsdk-bootstrap-wizard.js')}}"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="{{asset('front/assets/js/jquery.validate.min.js')}}"></script>
@endsection
