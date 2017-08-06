<div id="loginModal" class="modal fade login-modal" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Přihlásit</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">E-mail</label>

                  <div class="col-md-8">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Heslo</label>

                  <div class="col-md-8">
                      <input id="password" type="password" class="form-control" name="password" required>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-xs-12">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Pamatovat si mně?
                          </label>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-xs-12">
                      <a class="" href="{{ route('password.request') }}">
                          Zapomenuté heslo?
                      </a>
                      <br />
                      <a class="" href="{{ route('registerPage') }}">
                          Registrace
                      </a>
                      <button type="submit" class="btn btn-primary pull-right">
                          Přihlásit
                      </button>
                  </div>
              </div>
          </form>

      </div>

    </div>

  </div>
</div>
