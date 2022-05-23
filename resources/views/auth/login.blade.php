@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-header bg-white text-center borderBottom-color-yellow ">
                  <h4> {{ __('Login') }} </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-center">{{ __('Adres e-mail ') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-center">{{ __('Hasło') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('pamiętaj mnie') }}
                                    </label>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-md-8 ">
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-own-yellow">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row my-2  d-flex justify-content-center">

    <div class="col-md-4 p-2 border m-4 my-auto">
        <form action="{{route('login')}}" method="POST" class="">
            @csrf
            <h3>login</h3>
            <div class="m-2">
                <label for="logInUser" class="form-label">username:</label>
                <input type="text" name="username" id="LogInUser" class="form-control" required>
            </div>
            <div class="m-2">
                <label for="UserPassword">Password:</label>
                <input type="password" name="password" id="UserPassword" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button class="btn bg-own-yellow" type="submit">log in</button>
            </div>
        </form>
    </div> --}}

@endsection