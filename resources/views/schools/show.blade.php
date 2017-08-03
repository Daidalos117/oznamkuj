@extends('layouts/layout')

@section('content')
    <div class="container">
        <h1>{{$skola->plny_nazev}}</h1>
        <div class="details">
            <table class="detailsTable">
                <tr>
                    <td>Ředitel</td>
                    <td>{{$skola->reditel}}</td>
                </tr>
                <tr>
                    <td>Red izo</td>
                    <td>{{$skola->red_izo}}</td>
                </tr>
                <tr>
                    <td>IČO</td>
                    <td>{{$skola->ico}}</td>
                </tr>
                <tr>
                    <td>Území</td>
                    <td>{{$skola->uzemi}}</td>
                </tr>
            </table>
            <h3>Kontakty</h3>
            <table class="detailsContact">

                @if(!empty($skola->kontakt->telefon))
                <tr>
                    <td>Telefon</td>
                    <td>{{$skola->kontakt->telefon}}</td>
                </tr>
                @endif
                @if(!empty($skola->kontakt->fax))
                <tr>
                    <td>Fax</td>
                    <td>{{$skola->kontakt->fax}}</td>
                </tr>
                @endif
                @if(!empty($skola->kontakt->email_1))
                <tr>
                    <td>E-mail</td>
                    <td>
                        <a href="mailto:{{$skola->kontakt->email_1}}" target="_blank">{{$skola->kontakt->email_1}}</a>
                    </td>
                </tr>
                @endif
                @if(!empty($skola->kontakt->email_2))
                <tr>
                    <td>2. E-mail</td>
                    <td>
                        <a href="mailto:{{$skola->kontakt->email_2}}" target="_blank">{{$skola->kontakt->email_2}}</a>
                    </td>
                </tr>
                @endif
                @if(!empty($skola->kontakt->www))
                <tr>
                    <td>www</td>
                    <td><a href="{{$skola->kontakt->www}}" target="_blank">{{$skola->kontakt->www}}</a></td>
                </tr>
                @endif
            </table>
            
            <h3>Adresy</h3>
            @foreach($skola->adresy as $adresa)
            <strong>{{$adresa->typJmeno()}}</strong>
            <table>
                <tr>
                    <td>
                        Ulice:
                    </td>
                    <td>
                        {{$adresa->ulice}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Obec:
                    </td>
                    <td>
                        {{$adresa->misto}}
                    </td>
                </tr>
                <tr>
                    <td>
                        PSČ:
                    </td>
                    <td>
                        {{$adresa->psc}}
                    </td>
                </tr>
            </table>
            @endforeach
        </div>

        <form method="POST" action="{{ URL::to('/') }}/comments">
            {{ csrf_field() }}
            <select name="score">
                @for($i = 1; $i < 6; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <textarea name="comment" required></textarea>
            <input type="submit">
        </form>
    </div>
    @include('layouts.errors')
@stop
