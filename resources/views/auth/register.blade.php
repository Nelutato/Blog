@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-2">
            <div class="card bg-light">
                <div class="card-header bg-white text-center borderBottom-color-yellow ">
                  <h4> {{ __('Register') }} </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <div class="col-md-4 p-2 border m-4">
                    <form action="{{ route('register') }}" method="POST" >
                        @csrf
                        <h3>Register</h3>
                        <div class="m-2">
                            <label for="userEmail" class="form-label">E-mail:</label>
                            <input type="email" name="email"  id="userEmail" class="form-control" aria-describedy="emailHelo" required>
                        </div>
                        <div class="m-2">
                            <label for="logInUser" class="form-label">username:</label>
                            <input type="text" name="username"  id="LogInUser" class="form-control" required>
                        </div>
                        <div class="m-2">
                            <label for="UserPassword">Password:</label>
                            <input type="password" name="password"  id="UserPassword" class="form-control" required>
                        </div>
                        <div class="m-3">
                            <input type="checkbox" required>
                            <label for="AcceptTermOfUse">i accept Term of use 
                                <a href="termOfUsage">more...</a>
                            </label>  
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <button class="btn bg-own-yellow" type="submit">Register</button>
                        </div>
                    </form>
</div> --}}