<header class="header">
    <div class="container">
        <div class="col-xs-5 header-logo">
            <a href="{{url('/')}}">
                <img src="{{asset('storage/logo_2.svg')}}" alt="logo" class="header-logo-img img-responsive">
            </a>
        </div>
        <div class="col-xs-7 header-right">
            <ul class="menu">
                <li>
                    <a href="" class="js-search-toggle toggle-search-link">
                        <i class="fa fa-search" aria-hidden="true" data-toggle="dropdown"></i>
                    </a>
                </li>

                <li> 
                @if(!Auth::check())
                        <button data-toggle="modal" data-target="#loginModal" class="btn btn-default" type="button"><i class="fa fa-user" aria-hidden="true"></i> <span class="hidden-xs">Přihlásit</span></button>
                @else

                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <span class="hidden-xs">
                              {{Auth::user()->name}}&nbsp;
                              @if(!empty(Auth::user()->surname))
                                  {{substr(Auth::user()->surname, 0, 1)}}.
                              @endif
                          </span>
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
                        <li><a href="{{url('/odhlaseni')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

                      </ul>
                    </div>
                @endif
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="search-bar-container">
    <div class="search-bar">
        {{ Form::open(array('url' => 'hledat', 'method' => 'get')) }}
        <input type="text" class="search-input" name="dotaz" placeholder="Zadejte jméno školy, adresu.." >
        <button type="submit" class="btn btn-primary btn-send">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
        {{ Form::close() }}

    </div>
</div>
