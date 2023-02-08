@extends('auth.modele')

@section('contents')
<title>Ch@t.com</title>
<style>
        #parametres{
            margin-left: 400px;
            float: left;
        }
        #chat{
            float: right;
            margin-right: 400px;
        }
    </style>
    <br><br>
    <a href="{{route('accueil')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>
    
    <a href="/déconnexion">
        <button type="button1" class="btn btn-dark" style="margin-left: 1100px; width: 10%">Déconnexion</button>
    </a>
        <form class="d-flex" method="post" action="{{route('recherche')}}">
            <input class="form-control me-2" type="search" name="recherche" placeholder="Chercher des amis" aria-label="Search" style="width: 200px; margin-left:600px">
            <button class="btn btn-dark" type="submit" value="recherche" >Chercher</button>
            @csrf
        </form>
        <br><br><br><br>

    <div id="parametres">
        <br>
 
    
        <img src="param.png" class="img-fluid" alt="gestion" style="width:90%">
        <br>
        <a href="{{route('infos.edit')}}">
            <button type="button" class="btn btn-dark" style="width: 250px;">Modifier mes informations</button>
        </a>
        <br><br>
        <a href="{{route('mdp.update')}}">
            <button type="button" class="btn btn-dark" style="width: 250px;">Modifier mon mot de passe</button>
        </a>
    </div>

    <div id="chat">
        <br>
        <img src="chat.png" class="img-fluid" alt="gestion" style="width:70%; margin-left:25px">
        <br>
        <a href="{{route('showUsers')}}">
            <button type="button" class="btn btn-dark" style="width: 250px;">Amis</button>
        </a>
        <br><br>
        <a href="{{route('canal')}}">
            <button type="button" class="btn btn-dark" style="width: 250px;">Canal général</button>
        </a>
    </div>


<!--
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('accueil')}}">
                <img src="Friends-Time.png" alt="" width="100" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <ion-icon name="person-circle-sharp" size="large"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <ion-icon name="settings-outline" size="large"></ion-icon>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('infos.edit')}}">Modifier mes Informations</a></li>
                            <li><a class="dropdown-item" href="{{route('mdp.update')}}">Modifier mon Mot De Passe</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('showUsers')}}">
                            <ion-icon name="chatbubbles-sharp" size="large"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/déconnexion">
                            <ion-icon name="log-out-sharp" size="large"></ion-icon>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" method="post" action="{{route('recherche')}}">
                    <input class="form-control me-2" type="search" name="recherche" placeholder="Rechercher des Chatters" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" value="recherche" >Recherche</button>
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    -->
@endsection
