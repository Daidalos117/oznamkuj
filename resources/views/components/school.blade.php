@foreach($schools as $school)
    <div class="school col-xs-12">
            <h3>
                <a href="skoly/{{ $school->id }}">
                 {{ $school->plny_nazev }}
                </a>
            </h3>
    </div>
@endforeach
