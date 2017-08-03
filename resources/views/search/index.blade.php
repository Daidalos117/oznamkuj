@extends('layouts/layout')

@section('content')
        <h1>Hledat</h1>

        <div class="schools">
            @component('components.school', ['schools' => $schools])
            @endcomponent
        </div>
@stop
