@extends('auth.modele')

@section('contents')

<title>Modification des utilisateurs</title>

    <p><br></p>
    <a  class="btn btn-dark" href="{{route('admin')}}" style="margin-left:50px;">Accueil</a>
    <p><br></p>
    <center>
           <img src="mod.png" class="img-fluid" alt="inscription" style="width:35%">
            <br><br>
    <div class="container">
    <table class="table table-dark table-striped">
        <tr class="thead-info"> <td>Nom</td><td>Prénom</td><td>Adresse mail</td><td>N° de Téléphone</td><td>Statut</td></tr>

        @if(!empty($us))
            @foreach($us as $users)
                <tbody>
                <tr>
                    <td>{{$users->nom}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>{{$users->login}}</td>
                    <td>{{$users->numero}}</td>
                    <td>
                        <a href="{{route('admin_edit1',['id'=>$users->id])}}">
                            <button type="button" class="btn btn-dark">Modifier</button>
                        </a>
                    </td>
                </tr>
                </tbody>
            @endforeach
    </table>
</div>
    <div class="col-md-12">
        {!!$us->links() !!}
    </div>

    @else
        <p>information non disponible</p>
    @endif
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</center>
@endsection
