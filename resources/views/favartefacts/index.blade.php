@extends('layouts.art')

@section('title', 'Favorite artefacts')

@section('content')
    <div class="container">
        {{--<p>The id of the user is {{$user->id}}</p>--}}
        @if(isset($artefacts))
            @if(count($artefacts) >= 1)
                @foreach($artefacts as $artefact)
                    <div class="artefacts-area mb-5">
                        <div class="card">
                        {{--<svg class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{asset('images/artefacts/book_cover_01.jpg')}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>{{$artefact[0]->name}}</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="45%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>--}}
                        <a href="{{ url('/artefact/' . $artefact->id) }}">
                            <img class="card-img-top" src="{{asset('images/artefacts/book_cover_01.jpg')}}" width="100%" height=auto>
                        </a>
                        <div class="container card-cus-bottom">
                            <div class="flex-row row-list">
                                <div class="col-xs-2 float-left left_panel_info">
                                    <h5 class="card-title ">{{$artefact->name}}</h5>
                                    <h6 class="card-title">{{$artefact->author}}</h6>
                                </div>
                                <div class="col-xs-2 float-right right_panel_info">
                                    <div class="float-left">
                                        <button id="info_butt_{{$artefact->id}}" type="button" class="btn btn-primary button-image inter_info"></button>
                                    </div>
                                    <div class="float-right text-center">
                                        <button id="like_butt_{{$artefact->id}}" onclick="myFunction({{$artefact->id}}, 1)" type="button" class="btn btn-primary button-image inter_like"></button>
                                        <button id="like_butt2_{{$artefact->id}}" onclick="myFunction({{$artefact->id}}, 0)" type="button" class="btn btn-primary button-image inter_like_filled"></button>
                                        <span class="likes_text">
                                          <h6>{{$artefact->likes}}</h6>
                                        </span>
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
                        <h3>No favorites were added!</h3>
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
        function myFunction(id, type)
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
        }
    </script>
@endsection
