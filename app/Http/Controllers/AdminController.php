<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function accueil(){
        return view('admin.adminaccueil');
    }

    public function adminmodify()
    {
        $us = DB::table('users')->where('type',NULL)->simplePaginate(9);
        return view('admin.modify', ['us' => $us]);
    }


    public function accept(Request $request,$id)
    {
        $user = User::query()->findOrFail($id);
        $user->type = 'user';
        $user->save();

        $request->session()->flash('etat', 'Modification effectué avec succés!!');
        return redirect()->route('admin_modify');

    }

    public function reject(Request $request,$id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();

        $request->session()->flash('etat', 'Refus effectué avec succés!!');
        return redirect()->route('admin_modify');

    }

    public function showEditAdminForm()
    {
        return view('admin.add');

    }

    public function add(Request $request){
        $validated = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'mail' => 'required|string|max:50',
            'numero' => 'required|string|max:12',
            'username' => 'required|string|max:50',
            'mdp' => 'required|string',
        ]);

        $us = new User();
        $us->nom = $request->nom;
        $us->prenom = $request->prenom;
        $us->login = $request->mail;
        $us->numero = $request->numero;
        $us->username = $request->username;
        $us->password = Hash::make($request->mdp);
        $us->save();

        return back()->with('etat','Compte crée avec succés');

    }

    public function showDeleteForm(){
        $us = DB::table('users')->simplePaginate(12);
        return view('admin.delete')->with('us',$us);

    }

    public function delete($id){

        $us = DB::table('users')->where('id','=',$id)->delete();

        return back()->with('etat','Utilisateur supprimé');

    }

    public function showEditForm(){
        $us = DB::table('users')->where('type','=','user')->simplePaginate(12);
        return view('admin.edit')->with('us',$us);

    }

    public function Users($id){
        $us = User::findorfail($id);
        return view('admin.edit2',['user'=> $us]);

    }

    public function edit(Request $request,$id){
        $user = User::findorfail($id);
        $validated = $request->validate(
            [
                'nom' => 'string|max:255',
                'prenom' => 'string|max:255',
                'login' => 'string|max:255',
                'numero' => 'string|max:255',
                'username' => 'string|max:255'

            ]
        );
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->login = $validated['login'];
        $user->numero = $validated['numero'];
        $user->username = $validated['username'];
        $user->save();
        return back()->with('etat','Utilisateur modifié');
    }



}
