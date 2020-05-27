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
                            <a href="{{ url('/artefact/' . $artefact->id) }}">

                            </a>
                            <div class="container card-cus-bottom">
                                <div class="d-flex flex-row row-list">
                                    <div class="p-1 flex-fill bd-highlight left_panel_info">
                                        <a href="{{ url('/artefact/' . $artefact->id) }}">
                                            <h5 class="card-title ">{{$artefact->name}}</h5>
                                            <h6 class="card-title">{{$artefact->author}}</h6>
                                        </a>
                                    </div>
                                    <div class="p-1 flex-fill bd-highlight float-center">
                                        <div class="text-center right_panel_info">

                                            <div class="charts float-center">
                                                @if (!$artefact->favourite)
                                                    <form method="POST"
                                                          action="{{ url('/artefact/like/' . $artefact->id) }}">
                                                        @csrf
                                                        <button id="like_butt_{{$artefact->id}}" style="display: inline"
                                                                type="submit"
                                                                class="btn btn-primary button-image inter_like" ></button>
                                                    </form>
                                                @else
                                                    <form method="POST"
                                                          action="{{ url('/artefact/unlike/' . $artefact->id) }}">
                                                        @csrf
                                                        <button id="like_butt_{{$artefact->id}}" style="display: inline"
                                                                type="submit"
                                                                class="btn btn-primary button-image inter_like_filled"></button>
                                                    </form>
                                                @endif
                                                <span class="likes_text">
                                                <h6>{{$artefact->likes}}</h6>
                                            </span>
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
