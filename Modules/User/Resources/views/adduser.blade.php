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
                                <button class="btn btn-default btn-sm"><a href="{{Route('user')}}"  style="color: #e20909;">
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
                    <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}" role="form" onsubmit="return checkForm(this);" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if($errors->has('name'))
                                    <span class="text-danger">*{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @if($errors->has('email'))
                                    <span class="text-danger">*{{$errors->first('email')}}</span>

                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">User Type</label>

                            <div class="col-md-6">
                                <select id="user_type" type="string" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type" required>
                                    <option>user</option>
                                    <option>superadmin</option>
                                </select>
                            </div>
                            @if($errors->has('user_type'))
                                <span class="text-danger">*{{$errors->first('user_type')}}</span>

                            @endif
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @if($errors->has('password'))
                                    <span class="text-danger">*{{$errors->first('password')}}</span>

                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            @if($errors->has('confirm-password'))
                                <span class="text-danger">*{{$errors->first('confirm-password')}}</span>

                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="myButton" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>


@endsection
