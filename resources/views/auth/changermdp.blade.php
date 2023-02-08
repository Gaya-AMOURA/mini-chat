@extends('auth.modele')

@section('contents')
<style>
        input[class=form-control]{
            width:300px;
            text-align: center;
        }
    </style>
    <title>Modifier mon mot de passe</title>
    <br><br>
    <a href="{{route('accueil')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>
<center>
        <img src="mdp.png" class="img-fluid" alt="inscription" style="width:35%">
        <br><br>
      
        <form action="{{route('editmdp', ['id'=>$id])}}" method="post">
                <div class="form-group">
                    <label>Ancien mot de passe</label>
                    <input type="password" name="mdp" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Nouveau mot de passe</label>
                    <input type="password" name="nmdp" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Modifier</button>
             @csrf
            </form>
        <br> <br>

    </center>
    
@endsection
