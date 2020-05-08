@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="container">
        @if(isset($user))
            {{--<p><?php dd($categories); ?></p>--}}
            <div class="cat-main-div" onclick="resetEnter()">
                <div class="head-title text-center">
                    <h1>choose a topic</h1>
                </div>

                <div class="d-flex flex-wrap justify-content-around">
                    @for($k = 0; $k < $count;$k++)

                        {{--                        <div class="d-flex cat-col-md-2">--}}
                        <div class="d-flex col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <a href="{{ url('/category/' . $categoryNames[$k]->id) }}"
                               class="btn btn-dark cat-tile w-100 mt-4">
                                {{$categoryNames[$k]->nameCZ}}
                            </a>
                        </div>

                    @endfor
                </div>
            </div>
        @else
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Not found the USER in the database with number id {{$user->id}}!</h3>
                </li>
            </ul>
        @endif
    </div>
@endsection
