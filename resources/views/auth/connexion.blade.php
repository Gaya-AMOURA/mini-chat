@extends('auth.modele')

@section('contents')

    <head>
        <title>Connexion</title>
    <style>
    input[class=form-control]{
            width:300px;
            text-align: center;
        }
    </style>
    </head>
    <body>


    <body>
        <br>
        <a href="/">
            <button type="button" class="btn btn-dark" style="margin-left: 50px">Accueil</button>
        </a>
    <center>
        <img src="connexion.png" class="img-fluid" alt="connexion">

        <form method="post">
            <div class="form-group">
                <label>Adresse mail</label>
                <input type="text" class="form-control" name="login" placeholder="Login">
            </div>
            <br>
            <br>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder=" Mot de passe">
            </div>
            <br><br>

            <div class="d-grid gap-2 d-md-block">
                <input type="submit" class="btn btn-dark" value="Connexion">
                <input type="reset" class="btn btn-dark" value="Reset">
            </div>
            @csrf
        </form>
    </center>
    </body>

@endsection
