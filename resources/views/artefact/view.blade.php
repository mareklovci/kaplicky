@extends('layouts.app')

@section('title', 'Artefacts')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/artefact') }}">Artefacts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Artefact</li>
@endsection


@section('content')
    <div class="container py-4">
        @if (is_null($artefact))
            <div class="text-center">
                <h2>Currently no artefacts available.</h2>
            </div>
        @else
            <div class="artefact-area mb-5">
                <div class="card">
                    <a href="{{ url('/artefact/' . $artefact->id) }}">
                        <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto alt="book_cover">
                    </a>
                    <div class="card-cus-bottom">
                        <div class="col-xs-2 float-left left_panel_info">
                            <h5 class="artefact-name">{{$artefact->name}}</h5>
                            <h6 class="artefact-author">{{$artefact->author}}</h6>
                        </div>
                        <div class="col-xs-2 float-right right_panel_info">
                            <div class="float-left">
                                <button id="info_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_info"></button>
                            </div>
                            <div class="float-right text-center">
                                <button id="like_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_like"></button>
                                <h6 class="artefact-likes">{{$artefact->likes}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
