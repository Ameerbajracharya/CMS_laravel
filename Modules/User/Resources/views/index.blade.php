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
                                <button class="btn btn-default btn-sm"><a href="{{Route('user.create')}}"  style="color: #e20909;">
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>User Type</th>
                                <th>Created</th>
                                <th colspan="2" style="text-align: center;">Setting</th>
                            </tr>
                            @foreach($data['user'] as $user_info)
                                <tr>
                                    <td>{{$user_info->name}}</td>
                                    <td>{{$user_info->email}}</td>
                                    <td>
                                        @if($user_info->user_type == 'user')
                                            <a href="{{route('user.user_type',$user_info->id)}}" class="btn btn-sm btn-danger">User</a>
                                        @else
                                            <a href="{{route('user.user_type',$user_info->id)}}" class="btn btn-sm btn-info">SuperAdmin</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$user_info->created_at == NULL)
                                            {{$user_info->created_at->format('M-d-Y')}}
                                        @else
                                            <?php echo 'Null'; ?>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary  btn-sm" href="{{Route('user.edit',$user_info->id)}}">Edit</a>
                                    </td>
                                    <td><a class="btn btn-danger  btn-sm" id="delete" href="{{Route('user.delete',$user_info->id)}}">Delete</a></td>
                                </tr>
                            @endforeach
                            <tfoot>
                            {!! $data['user']->render() !!}
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
