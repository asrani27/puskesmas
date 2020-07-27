<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Alert;
use App\H_login;
use Carbon\Carbon;
use App\Mpuskesmas;
use GuzzleHttp\Client;
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
        if(Auth::attempt([$field => $login, 'password' => request()->password], false)) 
        {
            $datauser = Auth::user();
            $h = new H_login;
            $h->puskesmas_id = $datauser->puskesmas_id;
            $h->user_id = $datauser->username;
            $h->tanggal = Carbon::now()->format('Y-m-d');
            $h->jam     = Carbon::now()->format('h:i:s');
            $h->save();

            $namePuskesmas = Mpuskesmas::where('id', $datauser->puskesmas_id)->first()->nama;
            //Kirim Notif Ke Telegram Admin 
            $client  = new Client();
            $url     = "https://api.telegram.org/bot".env("BOTTELEGRAM","1314875498:AAEy9-7isizWK_0Vzr4Jy4pBDJAdzo-WK_A")."/sendMessage";
            $data    = $client->request('GET', $url, [
                'json' =>[
                "chat_id" => env("BOTTELEGRAM_CHATID","1127046145"), 
                "text" => "Puskesmas : ".$namePuskesmas."\nJamLogin : ".\Carbon\Carbon::now()."\nUsername : ".$datauser->username,"disable_notification" => true
                ]
            ]);

            $json = $data->getBody();
            
            return redirect('/home');
        } 
        else 
        {
            toast('Username / Password Salah', 'warning');
            return back();
        }
    }
}
