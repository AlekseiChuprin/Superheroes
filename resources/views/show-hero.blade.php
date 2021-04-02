<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hero {{$hero->nickname}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/main.css')}}">
</head>
<body>

<div class="wrapper">

    <div class="header">
        {{$hero->nickname}}
        <div class="name">{{$hero->real_name}}</div>
    </div>
    <div class="content">
        {{$hero->origin_description}}
        <div class="hero_foto">
            <img src="{{$hero->getImage()}}" alt="">
        </div>
        {{$hero->catch_phrase}}
    </div>
    <div class="clear"></div>
    <div class="footer">{{$hero->superpowers}}</div>
</div>

</body>
</html>
