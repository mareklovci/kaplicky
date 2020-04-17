@extends('layouts.art')

@section('title', 'Categories')

@section('content')
    @if(isset($user))
        {{--<p><?php dd($categories); ?></p>--}}
        <div>
            <button type="button" class="btn btn-primary button-image monButton"></button>
        </div>
        <div class="head-title text-center">
            <h1>choose a few topics</h1>
        </div>
        <div class="content" id="canvas">
            {{--@for($k = 1; $k <= count($categories);$k++)--}}
            @for($k = 1; $k <= 10;$k++)
                @if($categorySizes[$k-1] == 1)
                        <button type="button" class="btn btn-primary btn-circle rounded-circle btn-sm" id="cat-{{$k}}">{{$categoryNames[$k-1]->nameEN}}</button>
                @elseif($categorySizes[$k-1] == 2)
                        <button type="button" class="btn btn-primary btn-circle rounded-circle btn-dm" id="cat-{{$k}}">{{$categoryNames[$k-1]->nameEN}}</button>
                @else
                        <button type="button" class="btn btn-primary btn-circle rounded-circle btn-xl" id="cat-{{$k}}">{{$categoryNames[$k-1]->nameEN}}</button>
                @endif
            @endfor
        </div>
        <script>
            function randomCategoryPos(name, countButtons)
            {
                var DISTANCE = 360;
                var MAX_DISTANCE = 3.5 * DISTANCE;
                var sWidth = screen.width;
                var positionsX = [];
                var positionsY = [];
                var types = [];
                var offset = 50;

                if(sWidth <= 540)
                {
                    sWidth -= 100;
                    DISTANCE = 190;
                    MAX_DISTANCE = 3.5 * DISTANCE;
                    offset = 25;
                }
                else
                {
                    if(sWidth > 720)
                    {
                        sWidth = 720;
                    }
                }
                console.log(DISTANCE+ "dis\n");
                console.log(MAX_DISTANCE+ "max_dis\n");
                for(var i = 0; i < countButtons; i++)
                {
                    var size = document.getElementById(name + (i+1)).className;
                    var type;
                    if(size.includes("btn-sm"))
                    {
                        if(sWidth <= 540)
                        {
                            type = 45;
                        }
                        else
                        {
                            type = 60;
                        }
                    }
                    else if(size.includes("btn-dm"))
                    {
                        if(sWidth <= 540)
                        {
                            type = 65;
                        }
                        else
                        {
                            type = 120;
                        }
                    }
                    else
                    {
                        if(sWidth <= 540)
                        {
                            type = 90;
                        }
                        else
                        {
                            type = 180;
                        }
                    }
                    console.log(type + "<br>");
                    //document.write(type + "<br>");

                    var done = true;
                    var topS;
                    var rightS;
                    while(done)
                    {
                        if(i == 0)
                        {
                            topS = offset + type;
                        }
                        else
                        {
                            topS = (Math.floor(Math.random() * 2048) + offset) + type;
                        }
                        rightS = (Math.floor(Math.random() * sWidth) + 1) + type;
                        console.log(topS + " " + rightS + "nn<br>");

                        //Check distancing from other circles
                        var okay = true;
                        for(var k = 0; k < positionsX.length; k++)
                        {
                            var powX = Math.abs(positionsX[k] - topS);
                            var powY = Math.abs(positionsY[k] - rightS);
                            var tmp = Math.sqrt((powX*powX) + (powY*powY));
                            console.log(tmp+ "tmp<br>");
                            if(tmp < DISTANCE)
                            {
                                okay = false;
                                break;
                            }
                        }

                        if(okay)
                        {
                            done = false;
                        }
                    }

                    //document.write("<br>");
                    positionsX.push(topS);
                    positionsY.push(rightS);
                    types.push(type);
                }

                for(var i = 1; i <= countButtons; i++)
                {
                    document.getElementById(name + i).style.top = (positionsX[i-1] - types[i-1]) + "px";
                    document.getElementById(name + i).style.right = (positionsY[i-1] - types[i-1]) + "px";
                }
            }

            var countButtons = document.getElementById("canvas").getElementsByTagName('button').length;
            randomCategoryPos("cat-", countButtons);
        </script>
    @else
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Not found the USER in the database with number id {{$user->id}}!</h3>
            </li>
        </ul>
    @endif
@endsection
