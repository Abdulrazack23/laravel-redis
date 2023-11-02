@extends('layouts.guest')
@section('content')
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="index.html"><h4>Rosella</h4></a>

                            <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                @if($errors->has('email') || $errors->has('password'))
                                <div class="alert alert-danger">
                                    Invalid email or password.
                                </div>
                                @endif

                                <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                            </form>

                            <a href="{{ route('register') }}" class="text-primary">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection