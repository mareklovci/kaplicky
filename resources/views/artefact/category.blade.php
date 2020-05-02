@extends('layouts.app')

@section('title', 'Artefacts')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Artefacts</li>
@endsection


@section('content')
    <div class="container">
        <div class="jumbotron mt-5">
            <div class="text-center">
                <h1>Artefact list</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                    Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus.
                    Fusce tellus odio, dapibus id fermentum quis, suscipit id erat.
                    Morbi scelerisque luctus velit. Vivamus porttitor turpis ac leo.
                    Morbi scelerisque luctus velit.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
        </div>

        @if (count($artefacts) === 0)
            <div class="text-center category-h2">
                <h2>Currently no artefacts available.</h2>
            </div>
        @else
            @foreach($artefacts as $artefact)
                <div class="artefacts-area mb-5">
                    <div class="card">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="45%" y="50%" fill="#dee2e6" dy=".3em">Artefact image</text></svg>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ url('/artefact/' . $artefact[0]->id) }}">{{$artefact[0]->name}}</a> - {{$artefact[0]->author}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$artefact[0]->year}}, {{$artefact[0]->pages}} pages</h6>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus.
                                Fusce tellus odio, dapibus id fermentum quis, suscipit id erat.
                                Morbi scelerisque luctus velit. Vivamus porttitor turpis ac leo.
                                Morbi scelerisque luctus velit.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
