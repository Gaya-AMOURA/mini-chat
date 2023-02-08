@extends('auth.modele')

@section('contents')
    <title>Suppression d'un utilisateur</title>
    <p><br></p>
    <a  class="btn btn-dark" href="{{route('admin')}}" style="margin-left:50px;">Accueil</a>
    <p><br></p>
    <center>
        <img src="supp.png" class="img-fluid" alt="inscription" style="width:35%">
    <br><br>
    <div class="container">
    <table class="table table-dark table-stripped ">
        <tr class="thead-info"> <td>nom</td><td>prenom</td><td>N° de Téléphone</td><td>Statut</td></tr>

        @if(!empty($us))
            @foreach($us as $users)
                <tbody>
                <tr>
                    <td>{{$users->nom}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>{{$users->numero}}</td>
                    <td>
                        <a href="{{route('admin_delete',['id'=>$users->id])}}">
                            <button type="button" class="btn btn-dark">Supprimer</button>
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
