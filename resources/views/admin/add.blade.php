@extends('auth.modele')

@section('contents')
    <style>
        input[class=form-control]{
            width:300px;
            text-align: center;
        }
    </style>
    <title>Ajouter un utilisateur</title>
    <body>
        <br>
        <a href="{{route('admin')}}">
            <button type="button" class="btn btn-dark" style="margin-left: 50px">Accueil</button>
        </a>

    <center>
           <img src="ajout.png" class="img-fluid" alt="inscription" style="width:35%">
           <form method="post" action="{{route('admin_add')}}" method="post">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="nom">
                </div>
                <br>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="prénom" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Adresse mail</label>
                    <input type="text" class="form-control" name="mail" placeholder="email" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Numéro</label>
                    <input type="text" class="form-control" name="numero" placeholder="téléphone" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" class="form-control" name="username" placeholder="pseudo" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="mdp" placeholder=" Mot de passe" required>
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Ajouter</button>
             @csrf
            </form>
        <br> <br>
    </center>
    </body>

@endsection
