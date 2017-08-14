<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oznámkuj</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script>
       // rename myToken as you like
       window.Laravel =  <?php echo json_encode([
           'csrfToken' => csrf_token(),
       ]); ?>
    </script>
    <meta name="_token" content="{!! csrf_token() !!}" /> 
</head>
<body>

    @include('layouts.menu')


    <div class="main-content">
    @if (empty($noLayout))
         @yield('background')
            @include('components.breadcumbers')
        <div class="info-bar">
            <div class="container">

                @include('components.alert')
            </div>

        </div>
        <div class="container">
            @yield('heading')
        </div>
        <div class="content-container ">
            @yield('filters')
            <div class="container">

                <div class="row content-container-row">
                    @if (empty($noSidebar))
                    <div class="col-md-9 col-xs-12">
                        @yield('content')
                    </div>
                    <div class="col-md-3">
                        @include('components.sidebar')
                    </div>
                    @else
                    <div class="col-md-12 col-xs-12">
                        @yield('content')
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else

            @yield('content')

        @endif
    </div>
    @include('layouts.footer')
    @include('components.loginModal')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
