@extends('dashboard::layouts.master')
@section('title')


    {{$_panel}}


@endsection
@section('content')

    @include('dashboard::include.header')

  {!! Form::open(['url' => route('gallery.store'),
                'enctype' => 'multipart/form-data',
                'class' => 'form-horizontal'
  ]) !!}

    @include($_view_path.'layouts.form')
 {!! Form::close() !!}

    
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('#gallery-html-loader-btn').click(function(){

                $.ajax({
                    method: 'POST',
                    url: '{{route("gallery.load-gallery-row")}}',
                    data: {
                        _token:'{{csrf_token()}}'
                    },
                    success: function(response){
                        var data = $.parseJSON(response);
                        $('#gallery_row_wrapper').append(data.html);

                    }
                });
            });
        });
    </script>
@endsection
