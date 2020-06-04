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
                    <a href="#imageModal" data-toggle="modal">
                        <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto alt="book_cover">
                    </a>
                    <div class="card-cus-bottom">
                        <div class="col-xs-2 float-left left_panel_info">
                            <h5 class="artefact-name">{{$artefact->name}}</h5>
                            <h6 class="artefact-author">{{$artefact->author}}</h6>
                        </div>
                        <div class="col-xs-2 float-right right_panel_info">
                            <div class="float-left">
                                <button type="button" class="btn btn-primary button-image inter_info" data-toggle="modal" data-target="#informationModal"></button>
                            </div>
                            <div class="float-right text-center">
                                @if ($artefact->favourite)
                                    <a href="{{  action('ArtefactController@unlike', ['id' => $artefact->id]) }}">
                                        <button id="like_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_like_filled"></button>
                                    </a>
                                @else
                                    <a href="{{  action('ArtefactController@like', ['id' => $artefact->id]) }}">
                                        <button id="like_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_like"></button>
                                    </a>
                                @endif
                                <h6 class="artefact-likes">{{$artefact->likes}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Image modal -->
    <div class="modal image-modal fade" id="imageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-content">
                <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto alt="book_cover">
            </div>
        </div>
    </div>

    <!-- Information modal -->
    <div class="modal fade" id="informationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$artefact->name}} - {{$artefact->author}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Addition information about book.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
