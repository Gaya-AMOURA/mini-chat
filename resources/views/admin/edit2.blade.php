@extends('auth.modele')

@section('contents')
<title>Modification d'un utilisateur</title>

<style>
        input[class=form-control]{
            width:300px;
            text-align: center;
        }
    </style>
  <p><br></p>
    <a  class="btn btn-dark" href="{{route('admin')}}" style="margin-left:50px;">Accueil</a>
    <p><br></p>
    <p><br></p>
<center>
        <h1>Formulaire de modification</h1>
           <form action="{{route('admin_edit2',['id'=>$user->id])}}" method="post">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{$user->nom}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" class="form-control" name="prenom" value="{{$user->prenom}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Adresse mail</label>
                    <input type="text" class="form-control" name="login" value="{{$user->login}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Numéro</label>
                    <input type="text" class="form-control" name="numero" value="{{$user->numero}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" class="form-control" name="username" value="{{$user->username}}">
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Modifier</button>
             @csrf
            </form>
        <br> <br>
</center>
@endsection
