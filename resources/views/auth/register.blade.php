@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="login-card">
                <div class="card shadow">

                    <div class="card-body p-4">

                        <h2 class="card-title text-center">Get Started</h2>
                        <hr>


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group ">
                                <label for="name" class="">{{ __('Name') }}</label>


                                <input id="name" type="text"
                                       class="form-control bg-grey-lightest{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group ">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email"
                                       class="form-control bg-grey-lightest{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group ">
                                <label for="password" class="">{{ __('Password') }}</label>


                                <input id="password" type="password"
                                       class="form-control bg-grey-lightest{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group ">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control bg-grey-lightest"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group  mb-0">

                                    <button type="submit" class="btn btn-primary w-full">
                                        <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                                    </button>

                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('login') }}" class="btn bg-grey hover:bg-grey-dark w-full shadow mt-3">Already have an account? <strong>Login</strong></a>
            </div>
        </div>
    </div>
@endsection
