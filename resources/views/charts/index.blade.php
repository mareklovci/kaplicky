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
                        {{--<svg class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{asset('images/artefacts/book_cover_01.jpg')}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>{{$artefact[0]->name}}</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="45%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>--}}
                        <a href="{{ url('/artefact/' . $artefact->id) }}">
                            <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto>
                        </a>
                            <div class="container card-cus-bottom">
                                <div class="d-flex flex-row row-list">{{--<div class="flex-row row-list">--}}
                                    <div class="p-1 flex-fill bd-highlight left_panel_info">{{--<div class="col-xs-2 float-left left_panel_info">--}}
                                        <h5 class="card-title ">{{$artefact->name}}</h5>
                                        <h6 class="card-title">{{$artefact->author}}</h6>
                                    </div>
                                    <div class="p-1 flex-fill bd-highlight float-right">{{--<div class="col-xs-2 float-right right_panel_info">--}}
                                        <div class="text-right right_panel_info">{{--<div class="float-right text-center">--}}
                                            <div class="float-left">
                                                <button id="info_butt_{{$artefact->id}}" type="button" class="btn btn-primary float-left button-image inter_info"></button>
                                            </div>
                                            <div class="fav-cat-likes-t float-right">
                                                @if (!$artefact->favourite)
                                                <form method="POST" action="{{ url('/artefact/like/' . $artefact->id) }}">
                                                    @csrf
                                                    <button id="like_butt_{{$artefact->id}}" type="submit" class="btn btn-primary button-image inter_like"></button>
                                                </form>
                                                @else
                                                <form method="POST" action="{{ url('/artefact/unlike/' . $artefact->id) }}">
                                                    @csrf
                                                    <button id="like_butt_{{$artefact->id}}" type="submit" class="btn btn-primary button-image inter_like_filled"></button>
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
    <script>
        /*function myFunction(id, type)
        {
            if(type === 1)
            {
                $('#like_butt_' + id).css('display', "none");
                $('#like_butt2_' + id).css('display', "inline");
            }
            else
            {
                $('#like_butt_' + id).css('display', "inline");
                $('#like_butt2_' + id).css('display', "none");
            }
        }*/
    </script>
@endsection
