<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Session;

class LoginController extends Controller
{

        use AuthenticatesUsers;


        protected function authenticated(Request $request, $user)
        {
            if ( Auth::isAdmin() == 1) {// do your magic here
                return redirect()->route('/adm');
            }
            return redirect('/');
        }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            $user = auth()->user();
            switch($user->isAdmin){
                case 0:
                    return redirect()->intended('/');
                    break;
                case 1:
                    return redirect()->intended('/adm');
                    break;
                case 2:
                    return redirect()->intended('/vet');
                    break;
                }
            return redirect()->intended('/adm');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
