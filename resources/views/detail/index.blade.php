@extends('layouts.app')

@section('content')
    <h1>{{$arrArtefact->name}}</h1>
    <p>The id of the book is {{$id}}</p>
    @if(isset($arrArtefact))
        <p>{{$arrArtefact->author}}, {{$arrArtefact->year}}, {{$arrArtefact->pages}} pages, {{count($likes)}} likes</p>
{{--        <p><?php dd($metadata); ?></p>--}}
        @if(count($metadata) >= 1)
            <ul class="list-group">
            @foreach($metadata as $meta)
                    <li class="list-group-item">
                    On {{$meta->page}} page:<br>
                    {{$meta->noteCZ}}<br>
                    {{$meta->noteEN}}<br>
                </li>
                <br>
            @endforeach
            </ul>
        @else
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>No notes for this BOOK were found!</h3>
                </li>
            </ul>
        @endif
    @else
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Not found the Artefact in the database with number id {{$id}}!</h3>
            </li>
        </ul>
    @endif
@endsection
