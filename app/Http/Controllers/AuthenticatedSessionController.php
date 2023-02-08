<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function form(){
        return view('auth.connexion');
    }

    public function connexion(Request $request){

        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];

        if (Auth::attempt($request->only('login','password'))) {
            $request->session()->regenerate();

            $request->session()->flash('etat','Connexion aboutie ! ');
            if(Auth::user()->IsAdmin()){
                return redirect()->intended('/admin');
            }
            if(Auth::user()->IsUser()){
                return redirect()->intended('/accueil');
            }
            return redirect()->intended('/erreur');

        }else {
            return back()->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function déconnexion(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
