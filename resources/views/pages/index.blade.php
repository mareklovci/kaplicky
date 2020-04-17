@extends('layouts.app')

@section('title', 'Homepage')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Homepage</li>
@endsection

@section('content')
    <div class="text-center">
        <img src=".." alt="upm">
    </div>
    <div id="homepage_carousel" class="carousel slide" data-ride="carousel">
        <div class="row">
            <div class="col-md-4">
                <a href="">
                    <img src=".." alt="facebook">
                </a>
            </div>
            <div class="col-md-4 text-center">
                <a href="">
                    <img src=".." alt="instagram">
                </a>
            </div>
            <div class="col-md-4 text-right">
                <a href="">
                    <img src=".." alt="wikipedia">
                </a>
            </div>
        </div>


        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/homepage/logo_1.jpg') }}" alt="First slide">
            </div>
            <!-- <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/homepage/logo_1.jpg') }}" alt="First slide">
            </div> -->
        </div>
        <div class="carousel-caption d-md-block">
            <h2 class="text-center">kaplicky</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer turpis purus, volutpat quis libero aliquet, pulvinar accumsan erat.
                Praesent porttitor eleifend hendrerit. Vestibulum dictum nunc et leo finibus condimentum.
                Proin id tempor enim, eu ornare nisi. Phasellus ornare metus ut mi dapibus, varius elementum leo malesuada.
            </p>
        </div>
        <a class="carousel-control-prev" href="#homepage_carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homepage_carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="text-center mt-5">
        <a class="btn button-square" href="{{ url('/artefact') }}" role="button">enter</a>
    </div>
@endsection
