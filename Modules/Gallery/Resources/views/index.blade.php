@extends('dashboard::layouts.master')
@section('title')


    {{$_panel}}


@endsection
@section('content')

    @include('dashboard::include.header')

 <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">


                            <h3 class="card-title">{{$_panel}} Data</h3>
                            <button class="btn btn-default btn-sm"><a href="{{Route('gallery.create')}}"  style="color: #e20909;">
                                    <i class="fa fa-plus"></i>
                                    Add</a>  </button>
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
                                    <th>Caption</th>
                                    <th>Status</th>
                                    <th colspan="2" style="text-align: center;">Setting</th>
                                </tr>
                                @foreach ($data['gallery'] as $gallery)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <img src="{{url($_folderpath.DIRECTORY_SEPARATOR.$gallery->$_databaseimage)}}" alt="" style="width: 50px; height: 50px">
                                        </td>

                                        <td>{{$gallery->caption}}</td>


                                        @if($gallery->status == 0)
                                            <td>
                                                @if($gallery->status == 0)
                                                    <a href="{{route('gallery.status',$gallery->id)}}" class="btn btn-md btn-danger">Inactive</a>
                                                @else
                                                    <a href="" class="btn btn-xs btn-info">Active</a>
                                                @endif
                                            </td>
                                        @else
                                            <td>
                                                @if($gallery->status == 1)
                                                    <a href="{{route('gallery.status',$gallery->id)}}" class="btn btn-md btn-info">Active</a>

                                                @else
                                                    <a href="" class="btn btn-xs btn-danger">Inactive</a>
                                                @endif
                                            </td>
                                        @endif
                                        <td>
                                        	<a class="btn btn-primary " href="{{route('gallery.edit',$gallery->id)}}">Edit</a>
                                        </td>
                                        <td>
                                        	<a class="btn btn-danger " href="{{route('gallery.delete',$gallery->id)}}">Delete</a>
                                        </td>
                                    </tr>

                                @endforeach
                                <tfoot>
                                    {!! $data['gallery']->render() !!}
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

@stop
