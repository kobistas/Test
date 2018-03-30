@extends('layouts.app')

@section('content')
<div class="container">
  <br>
    <a class="btn btn-primary" href="/teams">Atgal</a>
  <div class="col-md-12">
    <br>



              <table class="">

                  <tbody>
                      @if(count($results) >= 1)
                      @foreach($results as $result)
                      <tr>
                        <!-- <td><b>{{$loop->iteration}} </b> </td> -->
                        <td><b>   <a href="/users/{{$result->teamhome->user->id}}"> {{$result->teamhome->team_name  }}</a></b></td>
                        <td><b>{{$result->home_score }}</b> </td>
                        <td><b>{{$result->away_score }}</b> </td>
                        <td><b><a href="/users/{{$result->teamhome->user->id}}">{{$result->teamaway->team_name}}</b></a> </td>
                        <td><b>{{$result->created_at}}</b> </td>
                        @if(Auth::user())
                        @if(Auth::user()->isAdmin() || Auth::user()->isModerator())
                        <td><b>{!!Form::open(['action' => ['ResultsController@destroy', $result->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              {{Form::submit('Trinti', ['class' => 'btn btn-danger'])}}
                          {!!Form::close()!!}</b>  </td>
                          @endif
                          @endif

                      </tr>
                      @endforeach
                      @else
                      <div class="">
                        <p><b>Nėra įkeltų rezultatų.</b> </p>
                      </div>
                      @endif


                  </tbody>
              </table>
              <br>


    </div>
    @if(Auth::user())
    @if(Auth::user()->isAdmin())
    @if(count($results)>=1)
    <div class="">
      <a href="/allresults" class="btn btn-primary" >Pradėti naują sezoną.</a>
      <br>

    </div>

      @endif
      @endif
      @endif
      <br>
</div>


@endsection
