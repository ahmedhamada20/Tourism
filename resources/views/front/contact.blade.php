@extends('front.layout.master')
@section('title')
{{trans('app.contact')}}
@endsection
@section('css')
@endsection
@section('content')
<!-- start contact area -->
<div class="contact-section">
    <div class="container">

    </div>
    <div class="contact-footer bg-light">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content pt-100 pb-70 ">
                        <div class="info-content">
                            <h3 class="sub-title">London Office</h3>
                            <div class="content-list">
                                <i class='bx bx-map'></i>
                                <h6>{{$setting->address}}</h6>
                            </div>
                            <div class="content-list">
                                <i class='bx bx-phone'></i>
                                <h6>{{$setting->phone}}</h6>
                            </div>
                            <div class="content-list">
                                <i class='bx bx-receipt'></i>
                                <h6>{{$setting->Fax}}</h6>
                            </div>
                            <div class="content-list">
                                <i class='bx bx-at'></i>
                                <h6>{{$setting->email}}</h6>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-form ptb-100">
                        <form action="{{route('contact_store')}}" method="POST">
                            @csrf
                            <h3 class="sub-title">{{trans('app.contact')}}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon"><i class='bx bx-user'></i></div>
                                        <input type="text" required name="name" class="form-control" id="name"
                                            required="" data-error="Please enter your name" placeholder="Name" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-icon"><i class='bx bx-at'></i></div>
                                        <input type="email" required name="email" class="form-control" id="email"
                                            required="" data-error="Please enter your email" placeholder="Email" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-icon"><i class='bx bx-comment-detail'></i></div>
                                        <input type="number" required name="phone" class="form-control" id="subject"
                                            required="" data-error="Please enter subject" placeholder="phone" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-icon textarea"><i class='bx bx-envelope'></i></div>
                                        <textarea name="text" required id="message" class="form-control" cols="100"
                                            rows="6" required="" data-error="Please enter your message"
                                            placeholder="Message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        {!! NoCaptcha::renderJs() !!}
                                        <div class="col-md-6">
                                            {!! app('captcha')->display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit">Send Message</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact section -->
@endsection
@section('js')
@endsection