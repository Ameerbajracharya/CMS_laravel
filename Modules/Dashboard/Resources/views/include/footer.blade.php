

<!-- jQuery -->
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.min.js')}}"></script>

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

    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('warning'))
    toastr.error("{{Session::get('warning')}}");
    @endif


</script>

<script>
    $('#logout').on('click', function() {
        return confirm("Are You Sure You Want To Logout?");
    });
</script>

<script>
    $('#delete').on('click', function() {
        return confirm("Are You Sure You Want To Delete?");
    });
</script>

<script type="text/javascript">

    function checkForm(form)
    {
        //
        // validate form fields
        //

        form.myButton.disabled = true;
        return true;
    }

</script>
