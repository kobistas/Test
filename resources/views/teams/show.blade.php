@extends('layouts.app')

@section('content')
<div class="container">
<br>
<br>
{{$team->team_name}}
<br><br>
{{$team->user->name}}
<br><br>
{{$team->played}}
<br><br>
{{$team->win}}
<br><br>
{{$team->draw}}
<br><br>
{{$team->lose}}
<br><br>
@if ($team->played>0)
{{$team->scored}}/{{$team->missed}} , AVG.  {{number_format($team->scored / $team->played, 1, '.', ',')}} +/- {{number_format($team->missed / $team->played, 1, '.', ',')}}
<br><br>
{{number_format( $team->win * 100 / $team->played)}}% WinRate,
@endif
<br><br>
{{$team->total_points}}
<br><br>

</div>
<div class="container">

  <div class="card">

    <div class="col-md-4">

      <div class="content">
        <table class="table table-hover table-striped">
          <thead>
            <th>Tavo Įrašyti rezultatai</th>
          </thead>
        </table>
      </div>

      <div class="content">
        <table class="table table-hover table-striped">
          @foreach($resultsHome as $resultHome)
          <thead>
            <th>{{$resultHome->created_at}}</th>
          </thead>
          <tbody>
            <tr>
              <td>{{$resultHome->teamhome->team_name  }} {{$resultHome->home_score }}:{{$resultHome->away_score }} {{$resultHome->teamaway->team_name}} </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <br>
      </div>
    </div>
  
    <div class="col-md-4">

      <div class="content">
        <table class="table table-hover table-striped">
          <thead>
            <th>Varžovų irašyti rezultatai</th>
          </thead>
        </table>
      </div>

      <div class="content">
        @foreach($resultsAway as $resultAway)
        <table class="table table-hover table-striped">
          <thead>
            <th colspan="2">{{$resultAway->created_at}}</th>
          </thead>
          <tbody>
            <tr>
              <td>{{$resultAway->teamhome->team_name  }}</td>
              <td>{{$resultAway->home_score }}</td>
            </tr>
            <tr>
              <td>{{$resultAway->teamaway->team_name}}</td>
              <td>{{$resultAway->away_score }}</td>
            </tr>
          </tbody>
        </table>
        <br>
        @endforeach
      </div>
    </div>
  </div>
</div>


@endsection
