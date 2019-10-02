@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-box">
                <div class="card">

                    <div class="card-body login-card-body">
                        <p class="login-box-msg"> Start Your Session</p>



                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="fa fa-envelope form-control-feedback"></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="fa fa-lock form-control-feedback"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox"name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
