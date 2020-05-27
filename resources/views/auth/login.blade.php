@extends('layouts.app')

@section('title', 'Login')

{{--@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Login</li>
@endsection--}}

@section('content')
    <div class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="auth">
                        <div class="card">
                            {{--<div class="card-header">{{ __('Login') }}</div>--}}

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <label for="logo" class="col-md-12 row kaplicky justify-content-center" >{{ __('kaplicky') }}</label>

                                    {{--<label for="email" class="col-md-8 col-form-label text-md-left row justify-content-center">
                                        {{ __('general.email') }}
                                    </label>
                                    <div class="col-md-4 offset-md-12 row justify-content-center">
                                        <input id="email" type="email"
                                               class="form-control text2 @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') }}" --}}{{--required autocomplete="email" autofocus--}}{{-->
                                    </div>--}}
                                    <div class="form-group row ">
                                        <label for="email" class="col-md-4 col-form-label text-md-right text">
                                            {{ __('general.email') }}
                                        </label>

                                        <div class="col-md-6">
                                            <input id="email" type="email @error('email') is-invalid @enderror"
                                                   class="form-control text2 @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" {{--required autocomplete="email" autofocus--}}>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right text">
                                            {{ __('general.password') }}
                                        </label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control text2 @error('password') is-invalid @enderror"
                                                   name="password" {{--required autocomplete="current-password"--}}>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn button-square">
                                                {{ __('general.join') }}
                                            </button>
                                            {{-- @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif --}}
                                        </div>
                                    </div>

                                    @if($errors->any())
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text white pin-left" role="alert">
                                                    <div class="al">
                                                        @error('email')
                                                        <p class="text">{{ $message }}</p>
                                                        @enderror
                                                        @error('password')
                                                        <p class="text">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
