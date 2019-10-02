@extends('dashboard::layouts.master')

@section('title')
    Edit {{$_panel}}
@endsection

@section('content')
    @include('dashboard::include.header')


    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                    
                        <!-- /.box-header -->
                        <!-- form start -->

                        {!! Form::model($data['gallery'],
                        ['url' => route($_base_route.'.update',$data['gallery']->id),
                            'enctype' => 'multipart/form-data'
                        ]) !!}

                            @include($_view_path.'layouts.edit_form')

                        {!! Form::close() !!}

                    </div>
                    <!-- /.box -->



                </div>
            </div>

        </section>
        <!-- /.content -->
@endsection