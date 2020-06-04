@extends('layouts.app')

@section('title', 'Charts')

@section('content')
    <div class="container">
        @if(isset($artefacts))
            @if(count($artefacts) >= 1)
                <div class="fav-cat-mybooks">
                    <h1>Charts</h1>
                </div>
                @foreach($artefacts as $artefact)
                    <div class="artefacts-area mb-5">
                        <div class="card">
                            <div class="container card-cus-bottom">
                                <div class="d-flex flex-row row-list">
                                    <div class="p-1 flex-fill bd-highlight left_panel_info">
                                        <a href="{{ action('ArtefactController@view', ['id' => $artefact->id]) /*url('/artefact/' . $artefact->id) */}}">
                                            <h5 class="card-title highlight-white">{{$artefact->name}}</h5>
                                        </a>
                                        <h6 class="card-title ">{{$artefact->author}}</h6>
                                    </div>
                                    <div class="p-1 flex-fill bd-highlight">
                                        <div class="text-center right_panel_info">
                                            <div class="charts float-right">
                                                @if (!$artefact->favourite)
                                                    <a href="{{  action('ArtefactController@like', ['id' => $artefact->id]) }}">
                                                        <button id="like_butt_{{$artefact->id}}" type="button"
                                                                class="btn btn-primary button-image inter_like"></button>
                                                    </a>
                                                @else
                                                    <a href="{{  action('ArtefactController@unlike', ['id' => $artefact->id]) }}">
                                                        <button id="like_butt_{{$artefact->id}}" type="button"
                                                                class="btn btn-primary button-image inter_like_filled"></button>
                                                    </a>
                                                @endif
                                                <h6 class="artefact-likes">{{$artefact->likes}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>No artefacts were added!</h3>
                    </li>
                </ul>
            @endif
        @else
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Not found the USER in the database with number id {{$user->id}}!</h3>
                </li>
            </ul>
        @endif
    </div>
@endsection
