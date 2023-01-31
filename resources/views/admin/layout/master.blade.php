<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.layout.header')
</head>
<body class="fixed-left" style="font-family: 'Cairo', sans-serif;">
@include('admin.layout.sidebar')
<div class="content-page">
    <div class="content">
        @include('admin.layout.navebar')
        <div class="page-content-wrapper ">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">

                @yield('content')
            </div><!-- container fluid -->

        </div>
    </div>
    @include('admin.layout.footer')
</div>

@include('admin.layout.footerjs')

</body>
</html>
