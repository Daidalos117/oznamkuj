<header class="header">
    <div class="row container-fluid">
        <div class="col-xs-6 header-logo">
            <p><a href="{{url('/')}}">Oznámkuj školu</a></p>
        </div>
        <div class="col-xs-6 header-right">
            <ul class="menu">
                <li>
                @if(!Auth::check())
                    <button data-toggle="modal" data-target="#loginModal" class="btn" type="button">Přihlásit</button>
                @else

                    <div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                          {{Auth::user()->name}}
                          @if(!empty(Auth::user()->surname))
                              {{substr(Auth::user()->surname, 0, 1)}}.
                          @endif
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Settings</a></li>
                        <li><a href="{{url('/odhlaseni')}}">Logout</a></li>

                      </ul>
                    </div>
                @endif
                </li>
            </ul>
        </div>
    </div>
</header>
