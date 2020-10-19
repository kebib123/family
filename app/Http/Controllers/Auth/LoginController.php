<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $data['name'] = $user->getName();
        $data['email'] = $user->getEmail();
        $data['phone'] = '';
        $data['password'] = bcrypt('123@123@123');
//        $data['remember_token'] = bcrypt(str_random('10'));
        $data['roles'] = 'user';
//        $data['token'] = base64_encode($user->getEmail());
//        $data['verified'] = 2;
        $data['remember_token'] = base64_encode($user->getEmail());

        $insert = User::firstorcreate(['email' => $user->getEmail()], $data);


        if ($insert) {
            Auth::login($insert);
            return redirect()->route('home')->with('success', 'Logged in successfully');

        } else {
            return redirect()->intended(route('home'))->with('error', 'You have already registered,Please login using your credentials');
        }
    }


    // $user->token;    }
}
