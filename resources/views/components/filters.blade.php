<div class="filters">
    <div class="container">
        <form class="filters" action="{{url()->current()}}" method="get">
            <span class="text-muted">Filtrovat: </span>
        {{ csrf_field() }}

        @if(!empty($filters['type'] ))
            <select class="selectpicker filter-select show-tick" name="types[]" title="Typ školy.." data-live-search="true" multiple>
            @foreach($filters['type'] as $type)
                <option value="{{$type->id}}" @if(isset($filtersSelected['types']) && in_array($type->id,$filtersSelected['types']))selected @endif>
                    {{$type->typ_jmeno}} ({{$type->typ_kod}})
                </option>
            @endforeach
            </select>
        @endif
            @if(!empty($_GET['dotaz'])) <input type="hidden" name="dotaz" value="{{ $_GET['dotaz'] }}">@endif
            <input type="submit" class="btn btn-primary" value="Filtrovat">
        </form>
    </div>
</div>
