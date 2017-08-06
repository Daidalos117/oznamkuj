<header class="header">
    <div class="row container">
        <div class="col-xs-6 header-logo">
            <p><a href="{{url('/')}}">Oznámkuj školu</a></p>
        </div>
        <div class="col-xs-6 header-right">
            <ul class="menu">
                <li>
                    <a href="">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>

                <li> 
                @if(!Auth::check())
                    <button data-toggle="modal" data-target="#loginModal" class="btn btn-default" type="button"><i class="fa fa-user" aria-hidden="true"></i> Přihlásit</button>
                @else

                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          {{Auth::user()->name}}&nbsp;
                          @if(!empty(Auth::user()->surname))
                              {{substr(Auth::user()->surname, 0, 1)}}.
                          @endif
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
