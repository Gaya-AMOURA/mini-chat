@extends('auth.modele')

@section('contents')
<style>
        input[class=form-control]{
            width:300px;
            text-align: center;
        }
    </style>
    <title>Modifier mes infos</title>
    <br><br>
    <a href="{{route('accueil')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>



    <center>
        <img src="info.png" class="img-fluid" alt="inscription" style="width:35%">
        <br><br>
      
        <form action="{{route('infosedit', ['id'=>$user->id])}}" method="post">
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
