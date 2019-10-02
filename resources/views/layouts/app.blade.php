<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KiteCms</title>
{{--{{ config('app.name', 'KiteCms') }}--}}
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/backend/https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/backend/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend/dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/iCheck/square/blue.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('public/backend/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- <script>--}}
    {{--  $(function () {--}}
    {{--    // Replace the <textarea id="editor1"> with a CKEditor--}}
    {{--    // instance, using default configuration.--}}
    {{--    CKEDITOR.replace('editor1')--}}
    {{--    //bootstrap WYSIHTML5 - text editor--}}
    {{--    $('.textarea').wysihtml5()--}}
    {{--  })--}}
    {{--  </script>--}}
    {{--  --}}{{-- ck editor --}}
    {{--  <script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>--}}
    {{--  <script>--}}
    {{--    CKEDITOR.replace('description');--}}
    {{--  </script>--}}



    <script>
        toastr.options = {
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 700,
            "timeOut": 1000,
            "extendedTimeOut": 1000
        }

        @if(Session::has('warning'))
        toastr.error("{{Session::get('warning')}}");
        @endif


    </script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue',
                increaseArea : '20%' // optional
            })
        })
    </script>
</body>
</html>
