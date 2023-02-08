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
   .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: black;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
    </style>

<title>Canal général</title>
<p><br></p>
    <a href="{{route('admin')}}">
        <button type="button1" class="btn btn-dark" style="margin-left: 50px; width: 10%">Accueil</button>
    </a>
<p><br></p>
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

    @endif
    {{$us->links()}}
</center>
               

   
@endsection
