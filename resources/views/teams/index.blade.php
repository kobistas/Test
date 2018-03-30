@extends('layouts.app')

@section('content')
<div class="s-hero">
  <br>
  <div class="container">
    <div class="row">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p style="text-align:center;">Susikurk savo tobulą <span style="color:white;">FIFA</span><span style="color:#a9ab19;">18</span> ULTIMATE TEAM, žaisk prieš geriausius Lietuvoje ir laimėk prizus.</p>
              </div>


              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                  <div class="diagrama">
                    <canvas id="myChart" ></canvas>
                  </div>
                  <br>
              </div>
              <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

              </div> -->
              @if(Auth::user() && $teamUser)
              @if(Auth::user()->fifaPlayed >= 1)
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="stat-box">
                  <br>
                  <h3>{{$teamUser->team_name}}  </h3>
                </div>
                <br>
              </div>

            <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="stat-box">
                  <br>
                  @if(Auth::user()->fifaPlayed > 0 && Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed >= 55 )
                  <h3><i class="fas fa-child"></i>
                    {{number_format(Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed)}}%
                  </h3>
                  @elseif(Auth::user()->fifaPlayed > 0 && Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed >= 40)
                  <h3><i class="fas fa-thumbs-up"></i>
                        {{number_format(Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed)}}%
                  </h3>
                    @elseif(Auth::user()->fifaPlayed > 0 && Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed >= 33)
                  <h3> <i class="fas fa-chart-line"></i>
                        {{number_format(Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed)}}%
                  </h3>

          @elseif(Auth::user()->fifaPlayed > 0 && Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed <= 32)
                  <h3><i class="fas fa-thumbs-down"></i>
                        {{number_format(Auth::user()->fifaWon * 100 / Auth::user()->fifaPlayed)}}%
                  </h3>
                  @endif





                </div>
                <br>
              </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                <div class="stat-box">
                  <br>
                  <h3><i  class="fas fa-futbol"></i> {{number_format(Auth::user()->fifaScored / Auth::user()->fifaPlayed, 1, '.', ',')}} +/- {{number_format(Auth::user()->fifaMissed / Auth::user()->fifaPlayed, 1, '.', ',')}} </h3>
                </div>
                <br>
              </div>
              <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
              <div class="stat-box">
                <br>
                <h3>W D L W W </h3>
              </div>
              <br>
            </div>
              <div class="col-xs-6 col-sm-5 col-md-4 col-lg-2 float-right">
              <div class="stat-box ">
                <br>
                <h3>
                  @if(Auth::user()->fifaPoints==0)
                  <i class="far fa-star-half"></i>
                  {{Auth::user()->fifaPoints}}/100
                  @elseif(Auth::user()->fifaPoints >=1 && Auth::user()->fifaPoints <= 99 )
                  <i class="far fa-star-half"></i>
                  {{Auth::user()->fifaPoints}}/100
                  @elseif(Auth::user()->fifaPoints >=100 &&Auth::user()->fifaPoints <= 199 )
                  <i class="far fa-star"></i><i class="far fa-star-half"></i>
                  {{Auth::user()->fifaPoints}}/200
                  @elseif(Auth::user()->fifaPoints >= 200 && Auth::user()->fifaPoints <= 299 )
                  <i class="far fa-star"></i><i class="far fa-star"></i>
                   {{Auth::user()->fifaPoints}}/300
                  @elseif(Auth::user()->fifaPoints >= 300 && Auth::user()->fifaPoints <= 399 )
                   <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star-half"></i>
                   {{Auth::user()->fifaPoints}}/400
                   @elseif(Auth::user()->fifaPoints >= 400 && Auth::user()->fifaPoints<= 499 )
                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    {{Auth::user()->fifaPoints}}/500
                    @elseif(Auth::user()->fifaPoints >= 500 && Auth::user()->fifaPoints <= 999 )
                     <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star-half"></i>
                     {{Auth::user()->fifaPoints}}/1000
                     @elseif(Auth::user()->fifaPoints >= 1000 )
                      <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                      {{Auth::user()->fifaPoints}}

                  @endif
                </h3>
              </div>
              <br>
            </div>
              @endif
              @endif

              @if( Auth::user() && !$teamUser || Auth::guest() || Auth::user()-> fifaPlayed ==0 )


              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="stat-box">
                  <br>
                  <h3><i class="fab fa-playstation"></i> Name </h3>
                </div>
                <br>
              </div>

              <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                <div class="stat-box">
                  <br>
                  <h3><i class="fas fa-thumbs-down"></i> 0% </h3>
                </div>
                <br>
              </div>
              <div class="col-xs-3 col-sm-4 col-md-6 col-lg-2">
                <div class="stat-box">
                  <br>
                  <h3><i  class="fas fa-futbol"></i> 0.0 +/- 0.0</h3>
                </div>
                <br>
              </div>
              <div class="col-xs-6 col-sm-3 col-md-6 col-lg-2">
              <div class="stat-box ">
                <br>
                <h3>

                  <i class="far fa-star-half"></i> 0/100


                </h3>
              </div>
              <br>
            </div>
              @endif









            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <!-- <div class="wow shake data-wow-duration="6s" data-wow-delay="6s""> -->

              @guest
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                &nbsp; <a href="{{route('fb.auth')}}" class="button alt scrolly ">Dalyvauti</a>
                <a class="button alt scrolly  float-right" href="{{ route('results.index') }}"> <i class="fas fa-gamepad"></i>  ( {{$countResults}} ) </a>
                </form>

              @else

              <a class="button alt scrolly float-left " href="{{ route('results.create') }}"><i class="fas fa-plus"></i> </a>&nbsp;&nbsp;
              @if(!$teamUser)
              <a class="button alt scrolly  " href="{{ route('teams.create') }}">Dalyvauti </a>
              @endif
              <a class="button alt scrolly  float-right" href="{{ route('results.index') }}"> <i class="fas fa-gamepad"></i>
                 <!-- ( {{$countResults}} )  -->
               </a>
              @endguest
            <p></p>  <!-- </div> -->

            </div>

          </div>
        </div>






      </div>
    </div>
  </div>

<div class="container">
  <div class="row">


@if(count($results) >= 1)
@foreach($results as $result)
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
  <br>
  <div class="card">
    <div class="card-header" style="text-align:center;">
      <span><b>{{$result->created_at->diffForHumans()}}</b> </span>
    </div>
    <div class="card-body" style="text-align:center;">
      <span class="float-left">  <img class=""
         src="/storage/avatar/{{$result->teamhome->user->avatar}}"
         style="width:35px;
          height:35px;
         border-radius:50%"></span>
      <span class=""> <b><a href="/users/{{$result->teamhome->user->id}}">{{$result->teamhome->team_name  }}</a></b></span> <span class="float-right"><b>{{$result->home_score }}</b></span>
      <br>
      <br>
      <br>
      <span class="float-left">  <img class=""
         src="/storage/avatar/{{$result->teamaway->user->avatar}}"
         style="width:35px;
          height:35px;

         border-radius:50%"></span>
      <span class=""><b><a href="/users/{{$result->teamaway->user->id}}">{{$result->teamaway->team_name  }}</a></b></span> <span class="float-right"><b>{{$result->away_score }}</b></span>
    </div>
  </div>
</div>
@endforeach
@else
<div class="">
  <br>

  <p><b>Rezultatų nėra</b> </p>
</div>
@endif
<br>
<div class="content">
  <br>

<!-- {{ $results->links() }} -->
</div>
<br>


<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <br>
  <form class="form-horizontal" method="POST" action="{{ route('teamsComments.store') }}">
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('body') ? ' has-error ' : ''}}">


      <textarea  name="body" placeholder="Jūsų komentaras" class="form-control"></textarea>

      @if ($errors->has('body'))
        <span class="help-block">
          <strong>
            {{ $errors->first('body') }}
          </strong>
        </span>
      @endif
    </div>
    <div class="form-group float-right">
      <div class="">
        <button type="submit" class="btn btn-primary">
          Išsaugoti
        </button>
      </div>
    </div>
  </form>
</div>
  @if(count($teamsComments) >= 1)
  @foreach ($teamsComments as $teamComment)

  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
    <br>
    <div class="card">
      <div class="card-header" style="text-align:center;">
        <span><b><a href="/users/{{$teamComment->user->id}}">{{$teamComment->user->name}}</a></b> </span>
      </div>
      <div class="card-body" style="text-align:center;">



        <span class="float-left"><b>{{$teamComment->body}}</b>  </span>
        <br>
        <span class="float-right" style="color:grey;"><b>{{$teamComment->created_at->diffForHumans()}}</b></span>

      </div>
    </div>
  </div>

  @endforeach
  @else

  @endif
  <br>
  <div class="content">
    <br>

    {{ $teamsComments->links() }}
  </div>
  <br> -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<br>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">

  <ul class="list-group">
    @if (Auth::guest())
    <li class="list-group-item">
      <div class="form-group">
        <p><b>Turnyro chat pokalbį ir dalyvių kontaktus gali matyti tik turnyro dalyviai. <br><br>  Prisijunk ir dalyvauk diskusijoje </b></p>
      </div>
    </li>
    @elseif (Auth::user() && $teamUser)
    <form class="form-horizontal" method="POST" action="{{ route('teamsComments.store') }}">
      {{ csrf_field() }}


    <li class="list-group-item">

        <div class="form-group {{ $errors->has('body') ? ' has-error ' : ''}}">

          <textarea  name="body" placeholder="Jūsų komentaras" class="form-control"></textarea>

          @if ($errors->has('body'))
            <span class="help-block">
              <strong>
                {{ $errors->first('body') }}
              </strong>
            </span>
          @endif
        </div>
        <div class="form-group float-left">
        </div>
    </li>
    <div class="">


      <div class="comment-background">

        <button type="submit" class="button alt scrolly commentcenter">
          <br>
          <i class="fas fa-comment-alt"></i>
          <br>
        </button>

      </div>


    </div>
  </form>
      @else
      <li class="list-group-item">

        <br>
        <p><b>Turnyro chat ir dalyvių kontaktus gali matyti tik turnyro dalyviai</b></p>
      </li>
      @endif
      @if(Auth::user() && $teamUser)
      @if(count($teamsComments) >= 1)
      @foreach ($teamsComments as $teamComment)


      <li class="list-group-item">
        <strong class="float-left" style="color:#c0c0c0;"><b><a  href="{{$teamComment->user->link}}"><i class="fab fa-facebook-square"></i></a> <a href="/users/{{$teamComment->user->id}}">{{$teamComment->user->name}}</a></b></strong>
        <br>
        <b>{{$teamComment->body}}</b>
        <br>

        <strong class="float-right" style="color:#c0c0c0;">{{$teamComment->created_at->diffForHumans()}}</strong>
      </li>

    @endforeach

    @else

    <li class="list-group-item">

      <br>
      <p><b>Turnyro chat pokalbis nepradėtas</b></p>
    </li>

    @endif
    @endif
  </ul>
  <br>
  <!-- {{ $teamsComments->links() }} -->
  <br>
</div>




    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">


    @if(count($teams) >= 1)
    <table>
      <!-- <br>

      <br> -->
      <thead>
        <tr>
        </tr>
        <tr>
          <th scope="col"><b>Pos.</b></th>
          <!-- <th scope="col"><b></b></th> -->
          <th scope="col"><b>PSN</b></th>
          <th scope="col"><b>P</b></th>
          <th scope="col"><b>W</b></th>
          <th scope="col"><b>D</b></th>
          <th scope="col"><b>L</b></th>
          <th scope="col"><b>+/-</b></th>
          <th scope="col"><b>Pts</b></th>
          @if(Auth::user())
          @if(Auth::user()->isAdmin() || Auth::user()->isModerator())
          <th scope="col"><b>-</b></th>
          @endif
          @endif

        </tr>
      </thead>
      <tbody>

        @foreach($teams as $team)
        <tr>
          <td data-label="Pos."><b>{{$loop->iteration}}</b></td>
          <!-- <td data-label="">
              <img class=""
               src="/storage/avatar/{{$team->user->avatar}}"
               style="width:35px;
                height:35px;

               border-radius:50%">
          </td> -->
          <td data-label="PSN">
            @if(Auth::user() && $teamUser)
            <a  href="{{$team->user->link}}"><i class="fab fa-facebook-square"></i></a>
            @endif
               <a href="/users/{{$team->user->id}}">
            <b>{{$team->team_name}}
              @if($loop->iteration==1)
              <i class="fas fa-trophy" style="color:#a9ab19;"></i>


              @elseif($loop->iteration > 1 && $loop->iteration < 3 )
              <i class="fas fa-star"style="color:#b9b4b4;"></i>
              @elseif($loop->iteration >= 3 && $loop->iteration < 17 )
              <i class="fas fa-star-half"style="color:#b9b4b4;"></i>
              @endif

            </b></a>
          </td>

          <td data-label="P"><b>{{$team->played}}</b></td>
          <td data-label="W"><b>{{$team->win}}</b></td>
          <td data-label="D"><b>{{$team->draw}}</b></td>
          <td data-label="L"><b>{{$team->lose}}</b></td>
          <td data-label="+/-"><b>{{$team->scored}}/{{$team->missed}}</b></td>
          <td data-label="Points"><b>{{$team->total_points}}</b></td>
          @if(Auth::user())
          @if(Auth::user()->isAdmin() || Auth::user()->isModerator())
          <td data-label="Pašalinti"><b>{!!Form::open(['action' => ['TeamsController@destroy', $team->id], 'method' => 'POST', 'class' => ''])!!}
               {{Form::hidden('_method', 'DELETE')}}

               {{Form::submit('', ['class' => 'btn btn-danger']) }}

               {!!Form::close()!!}</b></td>
          @endif
          @endif

        </tr>
        @endforeach

      </tbody>
    </table>
    @else
    <p><b>Turnyre šiuo metu nedalyvauja jokia komanda.</b> </p>
    @endif
<br>

<br>
  </div>

</div>
</div>

@if (!Auth::user() || !$teamUser)
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'doughnut',

	// The data for our dataset
	data: {
		labels: ["Nežaista", "Lygiosios", "Pralaimėta"],
		datasets: [{
			label: "My First dataset",

      backgroundColor: [

        'rgba(47, 209, 41, 0)'


      ],

      data: [100],
		}]
	},
	// Configuration options go here
	options: {
		legend: false
	}
});

</script>
@endif


@if (Auth::user())
@if ($teamUser)
@if (Auth::user()->fifaPlayed==0)
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'doughnut',

	// The data for our dataset
	data: {
		labels: ["Nežaista", "Lygiosios", "Pralaimėta"],
		datasets: [{
			label: "My First dataset",

      backgroundColor: [

        'rgba(47, 209, 41, 0)'


      ],

      data: [100],
		}]
	},
	// Configuration options go here
	options: {
		legend: false
	}
});

</script>

@elseif (Auth::user()->fifaPlayed>0)
<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'doughnut',

	// The data for our dataset
	data: {
		labels: ["Laimėta", "Lygiosios", "Pralaimėta"],
		datasets: [{
			label: "My First dataset",

			backgroundColor: [
				'rgba(95, 157, 92, 0.59)',
				'rgba(47, 209, 41, 0)',
				'#813f3f'

			],

			data: [{!! json_encode(Auth::user()->fifaWon) !!}, {!! json_encode(Auth::user()->fifaDraw) !!}, {!! json_encode(Auth::user()->fifaLost) !!}],
		}]
	},
	// Configuration options go here
	options: {
		legend: false
	}
});

</script>

@endif
@endif
@endif
@endsection
