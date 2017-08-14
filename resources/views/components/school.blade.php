<div class="col-md-12 no-padding">
@foreach($schools as $school)

    <div class="school panel panel-default color-grade-{{round($school->rating())}}">
        <div class="panel-body">
            <div class="col-md-9">
                <h3 class="no-padding school-name">
                    <a href="skoly/{{ $school->getUrl() }}">
                        {{ $school->plny_nazev }}
                    </a>
                </h3>
                <address class="text-muted school-address add-info">
                    <i class="fa icon fa-map-marker" aria-hidden="true"></i>
                    <!-- is street filled ? -->
                    @if($school->adresy[0]->ulice)
                        {{$school->adresy[0]->ulice}},  {{$school->adresy[0]->cislo_popisne}}
                         @if($school->adresy[0]->cislo_orientacni)/ {{$school->adresy[0]->cislo_orientacni}}@endif
                        {{$school->adresy[0]->misto}}
                    @else
                        {{$school->adresy[0]->misto}}
                        {{$school->adresy[0]->cislo_popisne}}
                        @if($school->adresy[0]->cislo_orientacni)/ {{$school->adresy[0]->cislo_orientacni}}@endif
                    @endif
                </address>
                <p class="text-muted no-padding school-types add-info">
                    <i class="fa icon fa-graduation-cap" aria-hidden="true"></i>
                    @foreach ($school->getTypesNames() as $type){{ $loop->first ? '' : ', ' }}{{ $type }}@endforeach
                </p>
                <div class="text-right">
                    <a href="skoly/{{ $school->getUrl() }}" class="">
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Více
                    </a>
                </div>
            </div>
            <div class="col-md-3 text-right">
                <div class="rating-score">
                    <span class="rating-score-text">
                        {{$school->rating()}}
                    </span>
                </div>
            </div>
        </div>
    </div>



@endforeach
</div>