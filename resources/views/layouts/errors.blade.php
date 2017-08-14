@if(count($errors))
    <div class="alert">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif