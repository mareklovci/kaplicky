@extends('layouts.app')

@section('title', 'Detail')

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/artefact') }}">Artefacts</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/artefact/' . $id) }}">Artefact</a></li>
    <li class="breadcrumb-item active" aria-current="page">Notes</li>
@endsection

@section('content')
    <div class="jumbotron">
        <div class="text-center">
            @if (isset($arrArtefact))
                <h1>Notes list</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                    Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus.
                    Fusce tellus odio, dapibus id fermentum quis, suscipit id erat.
                    Morbi scelerisque luctus velit. Vivamus porttitor turpis ac leo.
                    Morbi scelerisque luctus velit.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            @else
                <h2>Given artefact does not exist!</h2>
            @endif
        </div>
    </div>
    @if(isset($arrArtefact))
        <div class="artefact-area text-center mb-4">
            <h2>{{$arrArtefact->name}}</h2>
            <h4>{{$arrArtefact->author}}, {{$arrArtefact->year}}</h4>
            <h5 class="text-muted">{{$arrArtefact->pages}} pages, <i class="fas fa-thumbs-up"></i> {{$likes}}</h5>
        </div>
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
    @endif
@endsection
