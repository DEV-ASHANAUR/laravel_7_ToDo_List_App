<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

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


    public function showLoginForm()
    {
        //return view('auth.login');
        return view('newLogin');
    }

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        $gituser = Socialite::driver('github')->user();
        // dd($user);
        $user = User::firstOrCreate([
            'email' => $gituser->email
        ],[
            'name' => $gituser->name,
            'password' => Hash::make(Str::random(24))
        ]);
        Auth::login($user,true);
        return redirect()->route('home');
    }

    // //facebook login
    // public function fb()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }
    // public function fbRedirect()
    // {
    //     $fbuser = Socialite::driver('facebook')->user();
    //     dd($fbuser);
    // }
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
}
