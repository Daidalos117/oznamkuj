<?php

namespace App\Http\Controllers\Auth;

use App\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    /**
 	 *  Logic for redirecting after login, it has precendence after variable
 	 *
 	 * @param type
 	 * @return void
	 */
	
    protected function redirectTo()
    {
        Alert::setType(Alert::TYPE_SUCCES);
        Alert::setText("Přihlášení proběhlo úspěšně.");
        return url()->previous() ;
    }
    
    /**
 	 * What field use for login?
 	 *
 	 * @param type
 	 * @return void
	 */
	
    public function username()
    {
        return 'email';
    }
    
    public function getLogout() {
        Auth::logout();
        Session::flush();
        return redirect()->back();
    }
}
