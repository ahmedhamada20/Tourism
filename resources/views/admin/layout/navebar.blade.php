<!-- Top Bar Start -->
<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
            <a href="{{route('dashboard')}}" class="logo"><img src="{{asset('admin/assets/images/logo.png')}}" height="22" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom">


        <ul class="list-inline float-right mb-0">


            <li class="list-inline-item dropdown notification-list nav-user">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                   role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('admin/assets/images/users/avatar-6.jpg')}}" alt="user" class="rounded-circle">
                    <span class="d-none d-md-inline-block ml-1">{{Auth::user()->name}} <i
                            class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="dropdown-item" href="" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i
                                class="dripicons-exit text-muted"></i> Logout</a>

                    </form>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

        </ul>


    </nav>

</div>
<!-- Top Bar End -->
