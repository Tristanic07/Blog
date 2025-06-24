<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        //validate
        $fields = $request->validate([
                    'username' => ['required', 'max:225'],
                    'email' => ['required', 'max:255', 'email', 'unique:users'],
                    'password' => ['required', 'min:3', 'confirmed']
                   ]);

        //register
        $user = User::create($fields);
        
        //login
        Auth::login($user);

        //redirect
        return redirect()->route('posts.index');

    }

    public function login(Request $request) {
        //validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:3']
           ]);

        // Try to login
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors([
                'failed' => 'The provided credential do match our records'
            ]);
        };
    }

    public function logout(Request $request) {
        //log out the user
        Auth::logout();

        //invalidate user's session
        $request->session()->invalidate();

        //regenarate csfr token
        $request->session()->regenerateToken();

        //redirect home
        return redirect('/');
    }
}
 