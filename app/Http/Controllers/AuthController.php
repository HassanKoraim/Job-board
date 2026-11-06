<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\SignupRequest;

class AuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('auth.signup',[
            'pageTitle' => 'Sign Up Page'
        ]);
    }
    public function signUp(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        Auth::login($user);
        return redirect('/');
    }
    public function showLoginForm()
    {
        return view('auth.login',[
            'pageTitle' => 'Login Page'
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);  
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
