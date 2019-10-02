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
                                <button class="btn btn-default btn-sm"><a href="{{Route('product.create')}}"  style="color: #e20909;">
                                        <i class="fa fa-plus"></i>
                                        Add</a>
                                </button>

                            </div>

                            <div class="card-tools">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-group input-group-sm" style="width: 150px;">



                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>

                                        </div>


                                    </div>


                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                            <tr>
                                <th>Product Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Product Type</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th colspan="2" style="text-align: center;">Setting</th>
                            </tr>
                            @foreach ($data['product'] as $products)
                                <tr>
                                    <td> <img src="{{asset('public/images/product/'.$products->image)}}" alt="" style="width: 50px; height: 50px">
                                    </td>
                                    <td>{{$products->name}}</td>
                                    <td>{!!$products->description!!}</td>
                                    <td>
                                        @if(isset($products->brand))
                                            {{$products->brand->name}}
                                        @else
                                            {{" Unknown Brand"}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($products->category))
                                            {{$products->category->name}}
                                        @else
                                            {{" Unknown Brand"}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($products->producttype))
                                            {{$products->producttype->type}}
                                        @else
                                            No ProductType
                                        @endif

                                    </td>
                                    @if($products->status == 0)
                                        <td>
                                            @if($products->status == 0)
                                                <a href="{{route('product.status',$products->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                                            @else
                                                <a href="" class="btn btn-sm btn-info">Active</a>
                                            @endif
                                        </td>
                                    @else
                                        <td>
                                            @if($products->status == 1)
                                                <a href="{{route('product.status',$products->id)}}" class="btn btn-sm btn-info">Active</a>

                                            @else
                                                <a href="" class="btn btn-sm btn-danger">Inactive</a>
                                            @endif
                                        </td>
                                    @endif
                                    <td>{{$products->created_at->diffForHumans()}}</td>
                                    <td style="text-align: center;"><a class="btn btn-danger  btn-sm"  href="{{Route('product.edit',$products->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></td>
                                    <td style="text-align: center;"><a class="btn btn-danger  btn-sm" href="{{Route('product.delete',$products->id)}}" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
                                </tr>

                            @endforeach
                            <tfoot>
                            {!! $data['product']->render() !!}
                            </tfoot>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.row -->
        </div>
    </section>


@endsection
