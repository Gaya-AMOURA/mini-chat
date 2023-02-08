@extends('auth.modele')

@section('contents')
<style>
    center{
        text-align: center;
    }
    input[class=form-control]{
            margin-left: 450px;
            width:500px;
            text-align: center;
        }
   
    </style>
    <title>Canal général</title>
    <br><br>
    <a href="{{route('accueil')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>
<center>
    <img src="gene.png" class="img-fluid" alt="inscription" style="width:35%">
 <div class="container">

    <table class="table table-dark table-striped">
        <meta http-equiv="refresh" content="60">
        <tr class="thead-info"> <td>User</td><td>message</td></tr>

        @if(!empty($us))
            @foreach($us as $users)
                <tbody>
                <tr>
                    <td>{{$users->username}}</td>
                    <td>{{$users->message}}</td>
                </tr>
                </tbody>
            @endforeach
    </table>
     
    </div>
  

    <br><br>

    <form class="row g-3" action="{{route('messagecanal')}}" method="post">
        <div class="col-auto">
            <input type="text" class="form-control" name="message" placeholder="message">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-dark mb-3">
                <ion-icon name="paper-plane-sharp"></ion-icon>
            </button>
        </div>
        @csrf
    </form>
</center>
    @endif
     {{$us->links()}}
@endsection
