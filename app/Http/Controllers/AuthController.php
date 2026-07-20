<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register()
    {
        return view('register');
    }

    function insert(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:12'
            ],
            [
                'email.unique' => 'This email is already registered.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
            ]
        );
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);
        return redirect('register')->with('success', 'You have registered successfully');
    }

    function login()
    {
        return view('login');
    }

    function loginUser(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5|max:12'
            ],
            [
                'email.required' => 'Email register nh  h  bhai',
                'email.email' => 'email register nh  h  bhai',
                'password.required' => 'Password dalna h bhai',
                'password.min' => 'Password 5 se kam nh hoga',
                'password.max' => 'Password 12 se jyada nh hoga',
            ]
        );
            if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password]))
            {
                return "You are login successfully";
            }
            else
            {
                return redirect('login')->with('error', 'Invalid email or password');
            }
        }
}
