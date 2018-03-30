@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
      <br>
  <h1>Visi vartotojai ({{$usersCount}})</h1>
      <br>
      <!-- <a href="/posts/create" class="btn btn-primary float-right">Sukurti naujieną</a> -->
    </div>
    <br>
    <div class="col-xs-12 col-sm-12 col-lg-12">
      <form class="form-horizontal" method="GET" action="{{ route('users.index') }}">
        {{ csrf_field() }}
      <div class="form-group">

              <div class="col-xs-12 col-sm-12 col-lg-12">
                  <input id="s" type="text" class="form-control" name="s" placeholder="Paieška" value="{{ isset($s) ? $s : '' }}">
              </div>
          </div>


          <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">
                    Ieškoti
                  </button>
              </div>
          </div>
      </form>
    </div>



    @if(count($users) >= 1)
    <table>
      <br>

      <br>
      <thead>
        <tr>
          <th scope="col">Vartotojas</th>
          <th scope="col">Facebook</th>
          <th scope="col">Registruotas</th>
          <th scope="col"></th>


        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)

        <tr>


          <td data-label="Vartotojas"><b><a href="/users/{{$user->id}}">{{$user -> name}}</a></b></td>
          <td data-label="Facebook"><a href="{{$user->link}}"><i class="fab fa-facebook"></i></a> </td>
          <td data-label="Registruotas"><b>{{$user->created_at->diffForHumans()}}</b></td>
        @if ($user->isAdmin() || $user->isModerator())
        <!-- <td data-label=""><b><a href="#" class="btn btn-warning">ADMIN</a></b> </td> -->
        <td data-label=""><b><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Redaguoti</a></b> </td>
        
        @else
        <td data-label=""><b><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Redaguoti</a></b> </td>
        @endif
        </tr>



        @endforeach

      </tbody>
    </table>
    @else
    <p>Vartotojų nėra</p>
    @endif
<br>
    <div class="col-xs-12">
<br>
  {{ $users->appends(['s'=> $s])->links() }}
<br>
    </div>
<br>
  </div>

</div>



@endsection
