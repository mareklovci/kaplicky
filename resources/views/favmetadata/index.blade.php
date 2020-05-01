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
            <span class="arrow-down"></span>

            @if(count($metadata) > 0)
                @foreach($metadata as $meta)
                    <div  id="row_{{$meta->id}}" class="row text-page">
                        <div class="pin-horizontal">
                            <div class="metadata">
                                <span>page {{$meta->page}}</span>
                                <a href="#meta_{{$meta->id}}" class="arrow-down" data-toggle="collapse" data-target="#meta_{{$meta->id}}" onclick="openNote('#row_{{$meta->id}}')"></a>
                            </div>
                        </div>
                        <div id="meta_{{$meta->id}}" class="metadata-text collapse">
                            {{$meta->noteEN}}
                            <div class="artefact-info">
                                <div class="artefact-name">
                                    {{$meta->artefact->name}}
                                </div>
                                <div class="artefact-author">
                                    {{$meta->artefact->author}}
                                </div>
                                <div class="text-center">
                                    <button id="like_butt_{{$meta->id}}" type="button" class="btn btn-primary button-image inter_like_filled"></button>
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

    <script>
        function openNote(element) {
            let metadata = $(element);
            let showed = metadata.find(".metadata-text").hasClass('show');

            if (showed === false)
            {
                metadata.find('.pin-horizontal').addClass("white-pin");
            }
            else
            {
                metadata.find('.pin-horizontal').removeClass("white-pin");
            }

        }
    </script>
@endsection
