@extends('layouts/layout')



@section('background')
    <img src="{{asset('storage/img/mark.jpg')}}" alt="background" class="container-background" >
@stop


@section('content')

<h1>
    Jak známkujeme?
</h1>
<p>
    <strong>Známka školy je vypočítána na základě aritmetického průměru.</strong><br> Tedy součet hodnotících / počtem hodnotících.
</p>
    <p>
        Do budoucnosti plánuji algoritmus upravit. Uživatelská známka by měla váhu na základě přínosu uživatelových známek a komentářů.
    </p>
@stop
