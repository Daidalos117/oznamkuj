@if(!empty($alert))
<div class="alert alert-{{$alert['type']}} alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @if(!empty($alert['title'] ))
        <strong>{{ $alert['title'] }}</strong>
    @endif
    
    {{ $alert['text'] }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
