<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Alert;
use App\H_login;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::attempt([$field => $login, 'password' => request()->password], true)) 
        {
            $datauser = Auth::user();
            $h = new H_login;
            $h->puskesmas_id = $datauser->puskesmas_id;
            $h->user_id = $datauser->username;
            $h->tanggal = Carbon::now()->format('Y-m-d');
            $h->jam     = Carbon::now()->format('h:i:s');
            $h->save();
            return redirect('/home');
        } 
        else 
        {
            toast('Username / Password Salah', 'warning');
            return back();
        }
    }
}
