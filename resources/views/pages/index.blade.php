@extends('layouts.master')

@section('title', 'Homepage')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Homepage</li>
@endsection

@section('content')
    <div class="jumbotron">
        <div class="text-center">
            <h1>Welcome</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus.
                Fusce tellus odio, dapibus id fermentum quis, suscipit id erat.
                Morbi scelerisque luctus velit. Vivamus porttitor turpis ac leo.
                Morbi scelerisque luctus velit.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
            <a class="btn btn-primary btn-lg" href="{{ url('/artefact') }}" role="button">Continue</a>
        </div>
    </div>

    <div class="logo">
       <!-- Add logo here as link to next page -->
    </div>
@endsection
