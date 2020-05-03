@extends('layouts.app')

@section('title', 'Register')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Register</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="auth register">
            <div class="card">
                {{--<div class="card-header">{{ __('Register') }}</div>--}}

                <div class="card-body" style="padding-bottom: 0px">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <label for="logo" class="col-md-4 kaplicky">{{ __('kaplicky') }}</label>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control text2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" {{--required autocomplete="name" autofocus--}}>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email @error('email') is-invalid @enderror" class="form-control text2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" {{--required autocomplete="email"--}}>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" {{--required autocomplete="new-password"--}}>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('confirm password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{--required autocomplete="new-password"--}}>
                            </div>
                        </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn button-square">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        @if($errors->any())
                            <div class="col-md-6 offset-md-2">
                                <span class="text white pin-left" role="alert">
                                    <p> </p>
                                    @error('email')
                                             <p class="text">{{ $message }}</p>
                                     @enderror
                                    @error('password')
                                             <p class="text">{{ $message }}</p>
                                     @enderror
                                    @error('name')
                                             <p class="text">{{ $message }}</p>
                                     @enderror
                                </span>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
