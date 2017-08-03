<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

</head>
<body>

    @include('layouts.menu')



    @if (empty($noLayout))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    @else
        <div class="container-fluid">
        @yield('content')
        </div>
    @endif

    @include('layouts.footer')
</body>
</html>
