
<!-- jquery JS -->
<script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
<!-- bootstrap JS -->

<script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- bootstrap datepicker JS -->
<script src="{{asset('front/assets/js/bootstrap-datepicker.min.js')}}"></script>
<!-- magnific popup JS -->
<script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- filterizr JS -->
<script src="{{asset('front/assets/js/jquery.filterizr.min.js')}}"></script>
<!-- owl carousel JS -->
<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
<!-- mean menu JS -->
<script src="{{asset('front/assets/js/meanmenu.min.js')}}"></script>
<!-- form validator -->
<script src="{{asset('front/assets/js/form-validator.min.js')}}"></script>
<!-- contact form JS -->
<script src="{{asset('front/assets/js/contact-form-script.js')}}"></script>
<!-- ajax chimp JS -->
@livewireScripts
<script src="{{asset('front/assets/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- script JS -->

<script src="{{asset('front/assets/js/script.js')}}"></script>

@yield('js')


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

{{-- <script type="text/javascript">
    function CheckLanguage() {
        debugger;
        if (window.location.href.toLowerCase().indexOf("/en") > -1) {
            window.location.href = window.location.href.toLowerCase().replace('/en', '/ar');
        } else if (window.location.href.toLowerCase().indexOf("/ar") > -1) {
            window.location.href = window.location.href.toLowerCase().replace('/ar', '/en');

        } else {

            window.location.href = window.location.origin + '/en' + window.location.pathname;

        }
    }
</script> --}}


