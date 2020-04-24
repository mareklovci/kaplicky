@extends('layouts.app')

@section('title', 'Artefacts')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/artefact') }}">Artefacts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Artefact</li>
@endsection


@section('content')
    <div class="container">
        <div class="jumbotron mt-5">
            <div class="text-center">
                <h1>Artefact</h1>
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

        @if (is_null($artefact))
            <div class="text-center">
                <h2>Currently no artefacts available.</h2>
            </div>
        @else
            <div class="artefact-area mb-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-uppercase card-title">{{$artefact->name}}</h2>
                        <h5>{{$artefact->author}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$artefact->year}}, {{$artefact->pages}} pages</h6>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus.
                            Fusce tellus odio, dapibus id fermentum quis, suscipit id erat.
                            Morbi scelerisque luctus velit. Vivamus porttitor turpis ac leo.
                            Morbi scelerisque luctus velit.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <p>
                            @if (count($artefact->metadata) > 0)
                                <a href="{{ url('/detail/' . $artefact->id) }}">Notes related to artefact</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
