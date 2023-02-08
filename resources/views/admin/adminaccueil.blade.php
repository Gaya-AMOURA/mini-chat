@extends('auth.modele')

@section('contents')
<title>Administrateur</title>
    <style>
        #gestion{
            margin-left: 400px;
            float: left;
        }
        #section{
            float: right;
            margin-right: 400px;
        }
    </style>
    <br><br>
    <a href="{{route('admin')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>
    <a href="/déconnexion">
        <button type="button1" class="btn btn-dark" style="margin-left: 1100px; width: 10%">Déconnexion</button>
    </a>
        
        <br><br><br><br>

    <div id="gestion">
    <br>
 
    
    <img src="gest.png" class="img-fluid" alt="gestion" style="width:70%; margin-right: 10px">
    <br>
    <a href="{{route('admin_modify')}}">
        <button type="button" class="btn btn-dark" style="width: 250px;">Validation</button>
    </a>
    <br><br>
    <a href="{{route('admin_add')}}">
        <button type="button" class="btn btn-dark" style="width: 250px;">Ajout</button>
    </a>
    <br><br>
    <a href="{{route('admin_delet')}}">
        <button type="button" class="btn btn-dark" style="width: 250px;">Suppression</button>
    </a>
    <br><br>
    <a href="{{route('admin_edit')}}">
        <button type="button" class="btn btn-dark" style="width: 250px;">Modification</button>
    </a>
</div>
    <div id="section">
        <br><br>
        <br><br>
        <br><br><br><br>
        <form class="d-flex" method="post" action="{{route('recherche')}}">
            <input class="form-control me-2" type="search" name="recherche" placeholder="Chercher des amis" aria-label="Search" style="width: 200px">
            <button class="btn btn-dark" type="submit" value="recherche" >Chercher</button>
            @csrf
        </form>
        <br>
        
        <a href="{{route('canal')}}">
        <button type="button" class="btn btn-dark" style="width: 250px;">Canal général</button></a>
        <br>
        <img src="canal.png" class="img-fluid" alt="gestion" style="width: 80%">


    
    </div>


    <br><br>
    

   <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="marcus.gif" alt="" width="100" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin')}}">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion Utilisateurs
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('admin_modify')}}">Utilisateurs en attente d'acceptation</a></li>
                            <li><a class="dropdown-item" href="{{route('admin_add')}}">Ajouter un Utilisateur</a></li>
                            <li><a class="dropdown-item" href="{{route('admin_delet')}}">Supprimer un utilisateur</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('canal')}}">Canal Général</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/déconnexion">Déconnexion</a>
                    </li>
                </ul>
                <form class="d-flex" method="post" action="{{route('recherche')}}">
                    <input class="form-control me-2" type="search" name="recherche" placeholder="Chercher des amis" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit" value="recherche" >Chercher</button>
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    -->
@endsection
