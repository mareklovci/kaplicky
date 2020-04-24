@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <div id="homepage_carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="logos-overlay">
                <div class="museum-logo">
                    <div class="text-center">
                        <img src="{{ asset('images/icons/upm-logo.png') }}" alt="upm">
                    </div>
                </div>
                <div class="row social-logo">
                    <div class="col-md-4">
                        <a href="">
                            <img src="{{ asset('images/icons/facebook.png') }}" alt="facebook">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                            <img src="{{ asset('images/icons/instagram.png') }}" alt="instagram">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                            <img src="{{ asset('images/icons/wikipedia.png') }}" alt="wikipedia">
                        </a>
                    </div>
                </div>
                <div class="carousel-button">
                    <a class="btn button-square" href="{{ url('/artefact') }}" role="button">enter</a>
                </div>
            </div>

            <div class="carousel-item active" style="background-image: url({{ asset('../images/homepage/carousel_1.jpg') }})">
            </div>
        </div>
        <div class="carousel-caption d-md-block">
            <h2 class="text-center kaplicky">kaplicky</h2>
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
@endsection
