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
                                <button class="btn btn-default btn-sm"><a href="{{Route('brand.create')}}"  style="color: #e20909;">
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
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th colspan="2" style="text-align: center;">Action</th>
                                </tr>

                                @foreach ($data['brand'] as $brand)
                                    <tr>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->created_at->diffForHumans()}}</td>
                                        @if($brand->status == 0)
                                            <td>
                                                @if($brand->status == 0)
                                                    <a href="{{route('brand.status',$brand->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                                                @else
                                                    <a href="" class="btn btn-sm btn-info">Active</a>
                                                @endif
                                            </td>
                                        @else
                                            <td>
                                                @if($brand->status == 1)
                                                    <a href="{{route('brand.status',$brand->id)}}" class="btn btn-sm btn-info">Active</a>

                                                @else
                                                    <a href="" class="btn btn-sm btn-danger">Inactive</a>
                                                @endif
                                            </td>
                                        @endif
                                        <td style="text-align: center;"><a class="btn btn-primary  btn-sm" href="{{Route('brand.edit',$brand->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></td>
                                        <td style="text-align: center;"><a class="btn btn-danger  btn-sm" href="{{Route('brand.delete',$brand->id)}}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
                                    </tr>
                                @endforeach


                                <tfoot>
                                {!! $data['brand']->render() !!}
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
