@extends('layouts.app')

@section('title', 'Favorite metadata')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Favorite metadata</li>
@endsection

@section('content')
    <div class="container">
        <div class="metadata-area">
            <div class="text-center mt-5">
                <h2>notes</h2>
            </div>
            <!--<div class="text-right">
                <button type="button" class="btn btn-primary button-image inter_info"></button>
            </div> -->

            @if(count($metadata) > 0)
                @foreach($metadata as $meta)
                    <div class="row text-page">
                        <div class="pin-horizontal">
                            <div class="metadata">
                                <span>page {{$meta->page}}</span>
                                <a href="#meta_{{$meta->id}}" class="arrow-down" data-toggle="collapse" data-target="#meta_{{$meta->id}}"></a>
                            </div>
                        </div>
                        <div id="meta_{{$meta->id}}" class="metadata-text collapse">
                            {{$meta->noteEN}}
                            <div class="artefact-info">
                                <div class="artact-name">
                                    {{$meta->artefact->name}}
                                </div>
                                <div class="artefact-author">
                                    {{$meta->artefact->author}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>No favourite metadata yet!</h2>
            @endif
        </div>
    </div>
@endsection
