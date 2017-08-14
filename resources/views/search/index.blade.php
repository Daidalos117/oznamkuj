@extends('layouts/layout')

@section('background')
    <img src="{{asset('storage/img/books.jpg')}}" alt="background" class="container-background" >
@stop

@section('heading')
    <h1 class="content-main-heading search">
        <span class="text-muted label ">Hledat</span>
        <span class="label-accent label"> "{{$query}}" </span>
    </h1>
@stop
@section('filters')
    @include('components.filters')
@stop


@section('content')

        <div class="schools">
            @component('components.school', ['schools' => $schools])
            @endcomponent
        </div>
@stop
