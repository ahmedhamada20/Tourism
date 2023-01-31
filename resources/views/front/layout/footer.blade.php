<!-- start footer area -->
<footer class="footer-area">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-6 col-12">
                    <div class="footer-widget">
                        <img src="{{ asset('upload/setting/' . $setting->logo) }}" class="logo1" alt="Logo" style="width: 200px;height: 90px !important">
                        <p>{!! $setting->notes!!}</p>
                        <div class="contact-info">
                            <div class="content">
                                <a href="tel:+{{$setting->phone}}"><i class='bx bx-phone'></i>{{$setting->phone}}</a>
                            </div>
                            <div class="content">
                                <a href="{{$setting->email}}"><i class='bx bx-envelope'></i>{{$setting->email}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5>{{trans('app.blog')}}</h5>
                        <ul class="footer-news">
                            @foreach($blos as $blo)
                            <li class="content">
                                <a href="{{route('user_blog_details',$blo->id)}}">{{$blo->name}}</a>
                                <span>{{$blo->created_at->diffforhumans()}}</span>
                                <hr>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-5 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5>{{trans('app.quick_links')}}</h5>
                        <ul class="footer-links">
                            <li>
                                <a href="{{route('about')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{route('user_offer')}}">Destinations</a>
                            </li>
                            <li>
                                <a href="{{route('user_faq')}}">FAQ</a>
                            </li>
                            <li>
                                <a href="{{route('user_privacy')}}">Privacy</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h5>{{trans('app.trips')}}</h5>
                        <ul class="instagram-post">
                            @foreach($footer_trips as $trip)
                            <li>
                                @if($trip->photo)
                                <img src="{{asset('admin/pictures/trips/' . $trip->id .'/' .$trip->photo->Filename)}}"
                                    alt="Demo Image" style="height:100px;width: 150px">
                                @endif
                                <i class='bx bxl-instagram'></i>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- start top header area -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <div class="language text-center">
                                <a href="#language" id="languageButton" class="btn-secondary">
                                    {{ trans('app.lang') }} <i class='bx bxs-chevron-down'></i>
                                </a>
                                <ul class="menu">
                                    <li class="menu-item">

                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode =>
                                        $properties)
                                        <a class="dropdown-item text-center" rel="alternate"
                                            hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            @if ($properties['native'] == 'English')
                                            <img src="{{ asset('front/assets/img/flag-uk.png') }}" alt="flag">
                                            @elseif($properties['native'] == 'العربية')
                                            <img src="{{ asset('front/assets/img/flag-jordan.png') }}" alt="flag">
                                            @endif
                                            {{ $properties['native'] }}
                                        </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-md-4">
                            {{-- <form action="{{route('change_curacy')}}" method="post">
                                @csrf
                                <select class="form-control language" name="curanncy_id" style="display: inline">
                                    @foreach(App\Models\Currencies::all() as $curanncy)
                                    <option value="{{$curanncy->id}}">{{$curanncy->name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary"
                                    style="display: inline;    position: absolute;margin-right: 10px;margin-top: 5px;">Change</button>
                            </form> --}}

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Currency
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach(App\Models\Currencies::all() as $curanncy)
                                    <li>
                                        <form action="{{ route('change_curacy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="curanncy_id" value="{{ $curanncy->id }}">
                                            <button type="submit" class="dropdown-item">{{ $curanncy->name}}</button>
                                        </form>
                                    </li>
                                    @endforeach
                                    {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @auth

                            <div class="row">

                                <div class="col">

                                    <a href="{{ route('user_dashboard') }}" class="btn-secondary">
                                        {{ trans('app.dashboard') }}
                                    </a>
                                </div>

                                <div class="col">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf


                                        <a :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();" class="btn-secondary">
                                            {{trans('app.logout')}} </i>
                                        </a>
                                    </form>
                                </div>


                            </div>

                            @else
                            <a href="{{ route('login') }}" class="btn-secondary">
                                {{ trans('app.login') }} <i class='bx bx-log-in-circle'></i>
                            </a>
                            @endauth

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- end top header area -->
        <div class="copy-right-area">
            <div class="container">
                <div class="copy-right-content">
                    <p>
                        Copyright @<script>
                            document.write(new Date().getFullYear())
                        </script> Unseenegypt. Powered By
                        <a href="https://faroukgroup.com/" target="_blank">
                            Farouk Group
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer area -->