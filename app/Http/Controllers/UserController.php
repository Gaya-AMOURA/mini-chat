<?php

namespace App\Http\Controllers;

use App\Models\Amis;
use App\Models\Demande_Amis;
use App\Models\DemandeAmis;
use App\Models\General;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function showEditForm()
    {
        $id = Auth::id();
        $user = User::findorfail($id);
        return view('infoedit',['user'=>$user]);

    }

    public function edit(Request $request, $id)
    {
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
        $request->session()->flash('etat','Modification effectuée!');
        return back();
    }

    public function showuser()
    {
        $us = DB::table('users')->where('type','user')
            ->where('id','!=',Auth::id())
            ->simplePaginate(9);
        return view('user.viewusers', ['us' => $us]);
    }

    public function message(Request $request,$id){
        $us = DB::table('messages')
            ->join('users','messages.user_send_id','=','users.id')
            ->where('messages.user_send_id','=',Auth::id())
            ->where('messages.user_receive_id','=',$id)
            ->orWhere('messages.user_send_id','=',$id)
            ->where('messages.user_receive_id','=',Auth::id())
            ->select('users.id','users.username','messages.message','messages.user_receive_id')
            ->simplePaginate(10);

        if(sizeof($us)>100){
            foreach ($us as $user){
                DB::delete('messages',$user);
            }
        }
        return view('user.messages',['id'=>$id,'us'=> $us]);

    }

    public function messageenvoyé(Request $request,$id){
        $validated = $request->validate([
            'message' => 'string|max:255'
        ]);

        $message = new Message();
        $message->user_send_id = Auth::id();
        $message->user_receive_id = $id;
        $message->message = $request->message;
        $message->save();
        return back()->with('etat','Message envoyé');

    }

    public function searchUser(Request $request){

    }

    public function showmessageGénéral(){
        $us = DB::table('generals')
            ->join('users','generals.user_sent_id','=','users.id')
            ->select('users.id','users.username','generals.message')
            ->simplePaginate(10);
        if(Auth::user()->IsAdmin()){
            return view('admin.canal')->with('us',$us);
        }
        if(Auth::user()->IsUser()){
            return view('user.canal')->with('us',$us);
        }


    }

   public function messageGénéral(Request $request){

        $id = Auth::id();
        $message = new General();
        $message->user_sent_id = $id;
        $message->message = $request->message;
        $message->save();
       return back()->with('etat','Message envoyé');


   }

   public function recherche(Request $request){

        $us = DB::table('users')
            ->where('nom','=',$request->recherche)
            ->orWhere('prenom','=',$request->recherche)
            ->orWhere('username','=',$request->recherche)
            ->paginate(10);

       if(Auth::user()->IsAdmin()){
           return view('admin.recherche')->with('us',$us);
       }
       if(Auth::user()->IsUser()){
           return view('user.recherche')->with('us',$us);
       }

   }


}
