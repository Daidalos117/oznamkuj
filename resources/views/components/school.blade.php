@foreach($schools as $school)
    <div class="school col-xs-12">
            <h5>
                <a href="skoly/{{ $school->id }}">
                 {{ $school->plny_nazev }}
                </a>
            </h5>
    </div>
@endforeach
