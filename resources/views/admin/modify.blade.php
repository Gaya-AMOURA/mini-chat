@extends('auth.modele')

@section('contents')
<style>
    center{
        text-align: center;
    }
    </style>
    <title>Validation des utilisateurs</title>
    <p><br></p>
    <a  class="btn btn-dark" href="{{route('admin')}}" style="margin-left:50px;">Accueil</a>
    <p><br></p>
    <center>
    <img src="valid.png" class="img-fluid" alt="inscription" style="width:35%">
    <br><br>
    <div class="container">
    <table class="table table-dark table-striped">
        <tr class="thead-info"> <td>id</td><td>nom</td><td>prenom</td><td>Statut</td>

        @if(!empty($us))
            @foreach($us as $users)
                <tbody>
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->nom}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>
                        <a href="{{route('admin_accept',['id'=>$users->id])}}">
                            <button type="button" class="btn btn-dark">Accepter</button>
                        </a>
                        <a href="{{route('admin_reject',['id'=>$users->id])}}">
                            <button type="button" class="btn btn-dark">Refuser</button>
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
