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
                                <button class="btn btn-default btn-sm"><a href="{{Route('product.view')}}"  style="color: #e20909;">
                                        <i class="fa fa-list"></i>
                                        List</a>
                                </button>

                            </div>
                            <div class="card-tools">

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
                    @if(isset($data['product']))
                        {!! Form::model($data['product'],[
                                'url' =>route('product.update',$data['product']->id),
                                'enctype' => 'multipart/form-data',
                                'onsubmit'=>"return checkForm(this)"
                        ]) !!}
                    @else
                        {!!Form::open([
                                'url' => route('product.store'),
                                'enctype' => 'multipart/form-data',
                                'role' => 'form',
                                'onsubmit'=>"return checkForm(this)"

                        ])!!}
                    @endif
                    <div class="card-body">
                        <div class="form-group">

                            <div class="row">
                                @if(isset($data['product']))
                                    <div class="col-lg-6">
                                        <img
                                            src="{{asset('public/images/product/'.$data['product']->$_databaseimage)}}"
                                            alt="product image" style="width: 50px; height: 50px">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Image:</label>
                                        {{Form::file("mainimage",null,
                                            [
                                                'class'=>'form-control',
                                            ])
                                        }}
                                        <br>
                                        @if($errors->has('mainimage'))
                                            <span class="text-danger">*{{$errors->first('mainimage')}}</span>
                                            <br>
                                        @endif
                                    </div>
                                @else
                                    <div class="col-lg-6">
                                        <label>Image:</label>
                                        {{Form::file("mainimage",null,
                                            [
                                                'class'=>'form-control',
                                            ])
                                        }}
                                        <br>
                                        @if($errors->has('mainimage'))
                                            <span class="text-danger">*{{$errors->first('mainimage')}}</span>
                                            <br>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Name:</label>
                                            {{Form::text("name",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('name'))
                                                <span class="text-danger">*{{$errors->first('name')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                            <label>MRP:</label>
                                            {{Form::text("mrp",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('mrp'))
                                                <span class="text-danger">*{{$errors->first('mrp')}}</span>
                                                <br>
                                            @endif
                                            <br>

                                            <label>Code:</label>
                                            {{Form::text("code",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('code'))
                                                <span class="text-danger">*{{$errors->first('code')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                            <label>Discount:</label>
                                            {{Form::text("discount",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('discount'))
                                                <span class="text-danger">*{{$errors->first('discount')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                        </div>
                                        <div class="col-lg-6">



                                            <label>keyword:</label>
                                            {{Form::text("keyword",null,
                                                [
                                                    "class" => "form-control",
                                                ])
                                            }}
                                            @if($errors->has('keyword'))
                                                <span class="text-danger">*{{$errors->first('keyword')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                            <label>Brand:</label>

                                            {{Form::select("brand_id",$data['brand'], null,
                                                    [
                                                        "class" => "form-control",
                                                        "placeholder" => "Pick a brand...",
                                                    ])
                                            }}

                                            @if($errors->has('brand_id'))
                                                <span class="text-danger">*{{$errors->first('brand_id')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                            <label>Category:</label>
                                            {{Form::select("category_id",$data['category'], null,
                                                    [
                                                        "class" => "form-control",
                                                        "placeholder" => "Pick a category"
                                                    ])
                                            }}
                                            @if($errors->has('category_id'))
                                                <span class="text-danger">*{{$errors->first('category_id')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                            <label>Product Type:</label>
                                            {{Form::select("producttype_id",$data['type'], null,
                                                    [
                                                        "class" => "form-control",
                                                        "placeholder" => "Pick a Product Type"
                                                    ])
                                            }}
                                            @if($errors->has('producttype_id'))
                                                <span class="text-danger">*{{$errors->first('producttype_id')}}</span>
                                                <br>
                                            @endif
                                            <br>
                                        </div>

                                    </div>



                                </div>
                                <div class="col-lg-6">






                                    <label>Description:</label>
                                    {{Form::textarea("description",null,
                                        [
                                            "class" => "form-control",
                                            'id'=>"editor1"
                                        ])
                                    }}
                                    @if($errors->has('description'))
                                        <span class="text-danger">*{{$errors->first('description')}}</span>
                                        <br>
                                    @endif
                                    <br>


                                    <!-- End of Keywords -->
                                </div>

                            </div>
                            <button type="submit" name="myButton" class="btn btn-primary ">
                                <span class="state">Save</span>
                            </button>

                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <!-- /.card -->
            </div>
        </div><!-- /.row -->
        </div>
    </section>


@endsection
