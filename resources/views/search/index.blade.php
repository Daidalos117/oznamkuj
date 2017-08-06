@extends('layouts/layout')

@section('content')
    <h1>
        <span class="text-muted">Hledat</span>
            "{{$query}}"
    </h1>
        @include('components.filters')
        <div class="schools">
            @component('components.school', ['schools' => $schools])
            @endcomponent
        </div>
@stop
