@extends('dashboard::layouts.master')
@section('title')


    {{$_panel}}


@endsection
@section('content')
    @include('dashboard::include.header')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">


                            <h3 class="card-title">{{$_panel}} Data</h3>
                            <div class="row">
                                <button class="btn btn-default btn-sm"><a href="{{Route('producttype.view')}}"  style="color: #e20909;">
                                        <i class="fa fa-list"></i>
                                        List</a>  </button>


                            </div>
                            <div class="card-tools">
                                <div class="row">


                                    <div class="input-group input-group-sm" style="width: 150px;">

                                        <input type="text" name="table_search" class="form-control float-right"
                                               placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--/.form-->
                        @if(isset($data['producttype']))
                            {!! Form::model($data['producttype'],[
                                    'url' =>route('producttype.update',$data['producttype']->id),
                                    'enctype' => 'multipart/form-data',
                                    'onsubmit'=>"return checkForm(this)"
                            ]) !!}
                        @else
                            {!!Form::open([
                                    'url' => route('producttype.store'),
                                    'enctype' => 'multipart/form-data',
                                    'role' => 'form',
                                    'onsubmit'=>"return checkForm(this)"

                            ])!!}
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <br>
                                        <label>Product Type:</label>
                                        {{Form::text("type",null,
                                            [
                                                "class" => "form-control",
                                            ])
                                        }}
                                        @if($errors->has('type'))
                                            <span class="text-danger">*{{$errors->first('type')}}</span>
                                            <br>
                                        @endif
                                        <br>
                                        <button type="submit" name="myButton" class="btn btn-primary">
                                            <span class="state">Save</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>



                                {!! Form::close() !!}

                            </div>

                            <!-- /.card -->
                        </div>
                    </div><!-- /.row -->
                </div>
    </section>


@endsection
