@extends('layouts/layout')

@section('content')

    <div class="welcome-container">
       {{-- <img src="{{asset('storage/img/graduate.jpg')}}" class="welcome-image">--}}
        <div class="welcome-background" style="background: url({{asset('storage/pattern/memphis-colorful.png')}})"></div>
        <div class="welcome container-fluid col-lg-8 col-md-8 col-xs-12">
            <h1 class="welcome-header">Oznámkuj školu!</h1>
            <div class="welcome-text-content col-md-10">
            <p class="welcome-paragraph">A předej tak cenou zpětnou vazbu nejen své škole, ale i případným zájemcům o studium :)</p>
                <div class="welcome-search">
                    {{ Form::open(array('url' => 'hledat', 'method' => 'get')) }}
                    <input type="text" class="search-input" name="dotaz" placeholder="Zadejte jméno školy, adresu.." autofocus>

                    <button type="submit" class="btn btn-primary btn-send"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    {{ Form::close() }}

                </div>
                <div class="welcome-links">
                    <a href="{{url('/skoly')}}" class="welcome-allSchools">Všechny školy ({{$schoolsCount}})</a>
                </div>
            </div>
        </div>
    </div>
@stop
