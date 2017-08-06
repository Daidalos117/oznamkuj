@extends('layouts/layout')

@section('background')
   {{-- <img src="{{asset('storage/img/eli-francis-100644.jpg')}}" alt="background" class="container-background" >--}}
    <div class="container-background pattern" style="background: url({{asset('storage/pattern/memphis-colorful.png')}})">

    </div>
@stop

@section('heading')
    <h1 class="content-main-heading accent">{{$skola->plny_nazev}}</h1>
@stop

@section('content')
    <div class="container-fluid school-detail">

        <div class="details col-md-8">
            <table class="detailsTable table table-striped">
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
            <table class="detailsContact table table-striped">

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
            <address>
            <strong>{{$adresa->typJmeno()}}</strong>
            <table class="table table-striped">
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
            </address>
            @endforeach
        </div>

        <input type="hidden" class="js-school-id" value="{{$skola->id}}"/>

        <div class="col-md-4">
            <div class="rating-score">
                <span class="rating-score-text border-grade-{{round($rating)}}">
                    {{$rating}}
                </span>
                <!-- add rating -->
                <div class="rating-input">
                    <p class="text-muted">
                              
                            <div class="rated-text @if(!$userRating)hidden @endif"><small>Již jste hodnotil.</small></div>
                    </p>
                    @if(Auth::user())
                        <form method="POST" data-url="{{ URL::to('/hodnoceni') }}" class="js-rating-form">
                        {{ csrf_field() }}
                        
                        <select id="rating" class="rating-select js-rating-bar" data-rating="@if($userRating){{$userRating->rating}}@else 0 @endif">
                            <option value=""></option>
                            @for($i = 1; $i < 6; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        </form>
                    @else
                        <div>
                            <h4>Pro přidání hodnocení se prosím <a data-toggle="modal" data-target="#loginModal" href="javascript:void(0)">přihlašte</a>.</h4>
                        </div>
                    @endif
                </div>
            </div>

        </div>
            
            
            

        
        

        <div class="col-md-8">
            <hr />
            <h3>Přidej komentář</h3>
            <p class="muted">
                A obhaj tak své hodnocení!
            </p>
            
            <form method="POST" action="{{ URL::to('/') }}/komentare" class="comment-form">
                <input type="hidden" class="js-school-id" name="school_id" value="{{$skola->id}}"/>
                {{ csrf_field() }}
                <textarea name="comment" class="form-control" required></textarea>
                <input type="submit" class="btn btn-primary pull-right btn-submit">
            </form>
            
            
            <div class="comments">
                @foreach ($comments as $key => $comment)
                    <div class="comment col-md-12">
                        <div class="comment-avatar">
                            <img src="http://placecage.com/c/50/50" class="comment-avatar-img" alt='avatar' />
                        </div>
                        <div class="comment-body">
                            <div class="info">
                                <span class="name">{{$comment->user->name}} {{$comment->user->surname}}</span>
                                <span class="created ">{{$comment->created_at->format('d.m.y')}}</span>
                            </div>
                            <div class="comment-text">
                                {{$comment->comment}}
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:void(0)">Reagovat</a> | 
                                <a href="">Smazat</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        
        </div>
        
    </div>
    @include('layouts.errors')
@stop
