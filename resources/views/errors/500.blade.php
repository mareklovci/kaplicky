@extends('layouts.app')

@section('content')

    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span class="error">500 | {{ __('general.server_error') }}</span>
                </div>
            </div>
        </div>
    </div>

@endsection
