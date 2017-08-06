<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Sidebar;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/registrace';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function redirectTo() {
        return "/registrace";
    }
    
    public function index()
    {

        $alert = Alert::getData();
        Alert::reset();
        return view("auth.register", ['alert' => $alert,
            'sidebar' =>    Sidebar::getSidebar(),
            'breadCumbersTarget' => 'register'
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'surname' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        
        if ($validator->fails())
        {
            Alert::setType(Alert::TYPE_ERROR);
            Alert::setText("Opravte prosím problémová pole");

            //Session::flash('success', 'Gruppe ' . Input::get('display_name') . ' wurde erfolgreich bearbeitet');
            $this->alert = array(
                'type' => 'danger',
                'title' => 'Ups!',
                'text' => 'Opravte prosím tyto pole: '
            );
        }
                
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        Alert::setType(Alert::TYPE_SUCCES);
        Alert::setTitle("Registrace proběhla úspěšně.");
        Alert::setText("Můžete se přihlásit.");
        
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
