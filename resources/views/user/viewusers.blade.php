@extends('auth.modele')

@section('contents')
 <title>Utilisateurs</title>
    <br><br>
    <a href="{{route('accueil')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>
    <br><br>

    <center>
        <img src="users.png" class="img-fluid" alt="users" style="width:35%">
    </center>
    <div class="container">

    <table class="table table-dark table-striped">
        <tr class="thead-info"> <td>nom</td><td>prenom</td><td>N° de Téléphone</td><td>Statut</td></tr>

        @if(!empty($us))
            @foreach($us as $users)
                <tbody>
                <tr>
                    <td>{{$users->nom}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>{{$users->numero}}</td>
                    <td>
                        <a href="{{route('user_invit',['id'=>$users->id])}}">
                            <button type="button" class="btn btn-dark">Envoyer un Message</button>
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


@endsection
