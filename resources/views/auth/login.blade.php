@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-card">
                <div class="card shadow">
                    {{--<div class="card-header"></div>--}}

                    <div class="card-body p-4">

                        <h2 class="card-title text-center">Welcome Back</h2>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class=" text-md-right">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} bg-grey-lightest" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="password" class="text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} bg-grey-lightest"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <div class="flex justify-between w-full">
                                    <div class="px-2 py-1 text-base ">

                                        <input type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }} class="cursor-pointer">

                                        <label for="remember" class="cursor-pointer">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link px-2 py-1 text-base" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-0">

                                <button type="submit" class="btn btn-primary w-full text-uppercase">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                </button>


                            </div>
                        </form>
                    </div>
                </div>

                <a href="{{ route('register') }}" class="btn bg-grey hover:bg-grey-dark w-full shadow mt-3">Don't have an account? <strong>Get Started</strong></a>

            </div>
        </div>
    </div>
@endsection
