@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    @if(isset($user))
        {{--<p><?php dd($categories); ?></p>--}}
        <div class="cat-main-div" onclick="resetEnter()">
            <div class="head-title text-center">
                <h1>choose a few topics</h1>
            </div>
            <div class="row">
                {{--@for($k = 1; $k <= count($categories);$k++)--}}
                @for($k = 0; $k < $count;$k++)
                    <div class="col-md-2">
                        <button class="btn btn-dark cat-tile" onclick="showEnterButton({{$categoryNames[$k]->id}})">
                            {{$categoryNames[$k]->nameCZ}}
                        </button>
                    </div>
                @endfor
            </div>
            <div class="carousel-button">
                <a class="btn button-square cat-enter-butt" role="button">enter</a>
            </div>
        </div>
        <script>
            var catId = -1;
            var show = 0;

            function showEnterButton(id)
            {
                catId = id;
                show = 1;
                $(".cat-enter-butt").css('display', "inline");
            }

            function resetEnter()
            {
                if(show == 0)
                {
                    catId = -1;
                    $(".cat-enter-butt").css('display', "none");
                }
                show = 0;
            }
        </script>
    @else
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Not found the USER in the database with number id {{$user->id}}!</h3>
            </li>
        </ul>
    @endif
@endsection
