<!-- start header area -->
<header class="header-area">


    <!-- start navbar area -->
    <div class="main-navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo" style="height:30px !important">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('upload/setting/' . $setting->logo) }}" class="logo1" alt="Logo"
                                 style="width: 200px;height: 30px !important">
                            <img src="{{ asset('upload/setting/' . $setting->logo) }}" class="logo2" alt="Logo"
                                 style="width: 200px;height: 30px !important">
                        </a>
                    </div>
                    <div class="cart responsive">
                        <a href="cart.html" class="cart-btn"><i class='bx bx-cart'></i>
                            <span class="badge">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-nav" style="box-shadow: 2px 9px 5px 0px rgb(0 0 0 / 12%);">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}" style="height:100px !important">
                        <img src="{{ asset('upload/setting/' . $setting->logo) }}" class="logo1" alt="Logo" style="width: 200px;height: 90px !important">
                        <img src="{{ asset('upload/setting/' . $setting->logo) }}" class="logo2" alt="Logo" style="width: 200px;height: 90px !important">
                    </a>
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">{{ trans('app.home') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                <input class="toggle-class" onchange="CheckLanguage()" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Ar" data-off="En" {{ app()->getLocale() == "ar" ? 'checked' : '' }}>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('user_trips') }}" class="nav-link">{{ trans('app.trips') }}</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('user_offer') }}" class="nav-link">{{ trans('app.package') }}</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link">{{ trans('app.about') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user_blog') }}" class="nav-link">{{trans('app.blog')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user_transfer')}}" class="nav-link">{{ trans('app.transfer') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contact')}}" class="nav-link">{{ trans('app.contact') }}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- end navbar area -->
</header>
<!-- end header area -->
