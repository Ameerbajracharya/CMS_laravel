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
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}" role="form">
                            @csrf

                            <div class="form-group row">
                                <label> {{ $data['user']->name }}</label>

                            </div>
                            <div class="form-group row">

                                <label> {{ $data['user']->email }}</label>

                            </div>
                            <div class="form-group row">

                                <label> {{ $data['user']->user_type }}</label>
                            </div>
                        </form>

                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>


@endsection
