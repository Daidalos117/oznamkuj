@extends('layouts/layout')

@section('content')
<div class="welcome container-fluid">
    <h1 class="welcome-header">Oznámkuj školu!</h1>
    <p class="welcome-paragraph">A předej tak cenou zpětnou vazbu nejen své škole, ale i případným zájemcům o studium :)</p>
    <div class="welcome-search">
        {{ Form::open(array('url' => 'hledat', 'method' => 'get')) }}
        <input type="text" class="search-input" name="dotaz" placeholder="Zadejte jméno školy, adresu..">
        <input type="submit" class="btn btn-primary btn-lg">
        {{ Form::close() }}
        
    </div>
    <div class="welcome-links">
        <a href="skoly" class="welcome-allSchools">Všechny školy</a>
    </div>

</div>
@stop
