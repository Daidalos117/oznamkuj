@extends('layouts/layout')



@section('background')
    <img src="{{asset('storage/img/books.jpg')}}" alt="background" class="container-background" >
@stop

@section('heading')
    <h1 class="content-main-heading">Všechny školy</h1>
@stop
@section('filters')
    @include('components.filters')
@stop

@section('content')




            <div class="schools">
                @component('components.school', ['schools' => $schools])
                @endcomponent
            </div>
            {{ $schools->links() }}

@stop
