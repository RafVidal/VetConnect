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

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        dd('teste');
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            // Authentication passed...
            //dd('teste');
            return redirect()->intended(route('welcome'));
        } else{
            dd('praga');
        }
    }
}
