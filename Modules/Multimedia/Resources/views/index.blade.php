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
                                <button class="btn btn-default  btn-sm"><a href="{{Route('createmultimedia')}}"  style="color: #e20909;">
                                        <i class="fa fa-plus"></i>
                                        Add</a>
                                </button>

                            </div>
                            <div class="card-tools">


                                        <div class="input-group input-group-sm" style="width: 150px;">

                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th colspan="2" style="text-align: center;">Setting</th>
                                </tr>
                                @foreach ($data['multimedia'] as $multimedia)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <img src="{{url($_folderpath.DIRECTORY_SEPARATOR.$multimedia->$_databaseimage)}}" alt="" style="width: 50px; height: 50px">
                                        </td>

                                        <td>{{$multimedia->title}}</td>
                                        {{-- {{asset('public/images/multimedia/'.$multimedia->image)}} --}}
                                        <td>{!!$multimedia->description!!}</td>
                                        <td>{{$multimedia->created_at->diffForHumans()}}</td>
                                        @if($multimedia->status == 0)
                                            <td>
                                                @if($multimedia->status == 0)
                                                    <a href="{{route('multimediastatus',$multimedia->id)}}" class="btn btn-sm btn-danger">Inactive</a>
                                                @else
                                                    <a href="" class="btn  btn-info  btn-sm">Active</a>
                                                @endif
                                            </td>
                                        @else
                                            <td>
                                                @if($multimedia->status == 1)
                                                    <a href="{{route('multimediastatus',$multimedia->id)}}" class="btn btn-sm btn-info">Active</a>

                                                @else
                                                    <a href="" class="btn btn-danger  btn-sm">Inactive</a>
                                                @endif
                                            </td>
                                        @endif

                                        <td><a class="btn btn-primary  btn-sm" href="{{Route('editmultimedia',$multimedia->id)}}">
                                                Edit</a>
                                        </td>
                                        <td><a id="delete" class="btn btn-danger  btn-sm" href="{{Route('deletemultimedia',$multimedia->id)}}">Delete</a></td>
                                    </tr>

                                @endforeach
                            <tfoot>
                            {!! $data['multimedia']->render() !!}
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
