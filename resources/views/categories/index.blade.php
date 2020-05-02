@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    @if(isset($user))
        {{--<p><?php dd($categories); ?></p>--}}
        <div class="cat-main-div" onclick="resetEnter()">
            <div class="head-title text-center">
                <h1>choose a topic</h1>
            </div>
            {{--@for($k = 1; $k <= count($categories);$k++)--}}
            @for($k = 0; $k < $count;$k++)
                @if($k % 6 == 0)
                    <div class="row">
                @endif
                    <div class="col-md-2 cat-col-md-2">
                        <a href="{{ url('/category/' . $categoryNames[$k]->id) }}">
                            <button class="btn btn-dark cat-tile">
                                {{$categoryNames[$k]->nameCZ}}
                            </button>
                        </a>
                    </div>
                @if($k % 6 == 5 || $k + 1 == $count)
                    </div>
                @endif
            @endfor
        </div>
    @else
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Not found the USER in the database with number id {{$user->id}}!</h3>
            </li>
        </ul>
    @endif
@endsection
