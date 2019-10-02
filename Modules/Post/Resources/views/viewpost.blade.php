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
                                <button class="btn btn-default btn-sm "><a href="{{Route('post.create')}}"  style="color: #e20909;">
                                        <i class="fa fa-plus"></i>
                                        Add</a>  </button>


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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Metadata</th>
                                <th>Keyword</th>
                                <th>Tag</th>
                                <th>Created</th>
                                <th colspan="2" style="text-align: center;">Action</th>

                            </tr>
                            @foreach ($data['post'] as $post)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$post->title}}</td>
                                    <td>{!!$post->description!!}</td>
                                    <td>{{$post->metadata}}</td>
                                    <td>{{$post->keyword}}</td>
                                    <td>{{$post->tag}}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td style="text-align: center;">
                                    <td><a class="btn btn-primary  btn-sm" href="{{Route('post.edit',$post->id)}}">
                                            Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger  btn-sm" id="delete" href="{{Route('post.delete',$post->id)}}">Delete</a>
                                    </td>
                                </tr>

                            @endforeach
                            <tfoot>
                            {!! $data['post']->render() !!}
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
