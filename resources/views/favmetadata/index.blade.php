@extends('layouts.app')

@section('title', 'Favorite metadata')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Favorite metadata</li>
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron mt-5">
            <div class="text-center">
                <h1>Favorite metadata</h1>
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

        <div class="metadata-area">
            @if(count($metadata) > 0)
                <ul class="list-group">
                    @foreach($metadata as $meta)
                        <div class="note-area mb-3">
                            <li class="list-group-item">
                                On {{$meta->page}} page:<br>
                                {{$meta->noteCZ}}<br>
                                {{$meta->noteEN}}<br>
                            </li>
                        </div>
                    @endforeach
                </ul>
            @else
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>No notes for this BOOK were found!</h3>
                    </li>
                </ul>
            @endif
        </div>
    </div>
@endsection
