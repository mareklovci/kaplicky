@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="container">
        @if(isset($user))

            <div class="cat-main-div" {{--onclick="resetEnter()"--}}>
                <div class="d-flex flex-wrap justify-content-around btn-group" data-toggle="buttons">
                    @for($k = 0; $k < $count;$k++)
                        <div class="d-flex col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <a id="cat-but-id{{$categoryNames[$k]->id}}"{{--href="{{ url('/category/' . $categoryNames[$k]->id) }}"--}}
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
    <div class="cat-wrapper">
        <a class="btn button-square cat-enter-butt" onclick="test()" role="button">enter</a>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
{{--
            <a class="btn button-square cat-enter-butt" onclick="test()" role="button">enter</a>
--}}
        </div>
    </div>
    <script>
        function test()
        {
            var btns = $(".btn-dark:not(:disabled):not(.disabled).active");
            if(btns.length > 0)
            {
                var text = "";
                for(var i = 0; i < btns.length;i++)
                {
                    var idE =  btns[i].id;
                    var num = idE.substring(10, idE.length);
                    text += num + ",";
                }
                window.location.href = "{{url('/category/multi/')}}/" + text;
            }
        }
    </script>
@endsection
