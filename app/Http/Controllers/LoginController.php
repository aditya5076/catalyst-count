<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {
        return view('login');
    }
    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->except(['_token']);


        $user = User::where('email', $request->email)->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('home');
        } else {
            $errors = [
                'message' => 'Invalid credentials'
            ];
            return redirect()->to('/')->with('errors', $errors);
        }
    }
    public function show_signup_form()
    {
        return view('register');
    }
    public function process_signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');

        return redirect()->to('/');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
