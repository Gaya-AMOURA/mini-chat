<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{

    public function form(){
        return view('auth.inscription');
    }

    public function enregistrer(Request $request){
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'mail' => 'required|string|max:50',
            'numero' => 'required|string|max:12',
            'username' => 'required|string|max:50',
            'mdp' => 'required|string',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->mail;
        $user->numero = $request->numero;
        $user->username = $request->username;
        $user->password = Hash::make($request->mdp);
        $user->save();

        session()->flash('etat','Compte crée avec succés ! ');

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(){
        $id =  Auth::id();
        return view('auth.changermdp')->with('id', $id);
    }


    public function edit(Request $request ,$id){
        $user = User::find($id);

        if (Hash::check($request->mdp , $user->password)) {

            $request->validate([
                'nmdp' => 'required|string'//|min:8',
            ]);
            $user->password = Hash::make($request->nmdp);
            $user->save();

        }else{
            return back()->with('etat','mot de passe incorrect');
        }

        return back()->with('etat','Votre mot de passe a été bien modifié');



    }
}
