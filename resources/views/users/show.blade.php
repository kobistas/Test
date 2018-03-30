@extends('layouts.app')

@section('content')
<div class="s-hero">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <br>
      <a class="button alt scrolly" href="/teams">Atgal</a>
      <br>
      <br>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="jumbotron text-center" style="background:#1c1d22;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img class="" src="/storage/avatar/{{$user->avatar}}" style="width:150px; height:150px; bottom:20px;  left:10px; border-radius:50%">
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3><b>{{ $user->name}}</b> </h3>
                <!-- @if($teamUser->played >= 1 )
                <a class="" style="font-size:25px; color:#fff;" href="{{$user->link}}"><i class="fab fa-facebook-square"></i></a>
                @endif -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="jumbotron text-center" style="background:#1c1d22;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img class="" src="/storage/avatar/fifa.png" style="width:150px; height:150px; bottom:20px;  left:10px; border-radius:50%">
              </div>
              @if($teamUser->played >= 1 )
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="stat-box">
                  <br>
                  <h3>{{$teamUser->team_name}} </h3>
                </div>
                <br>
              </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="stat-box">
                  <br>
                  @if($teamUser->played > 0 && $teamUser->win * 100 / $teamUser->played >= 55 )
                  <h3><i class="fas fa-child"></i>
                    {{number_format($teamUser->win * 100 / $teamUser->played)}}%
                  </h3>
                  @elseif($teamUser->played > 0 && $teamUser->win * 100 / $teamUser->played >= 40)
                  <h3><i class="fas fa-thumbs-up"></i>
                    {{number_format($teamUser->win * 100 / $teamUser->played)}}%
                  </h3>
                  @elseif($teamUser->played > 0 && $teamUser->win * 100 / $teamUser->played >= 33)
                  <h3> <i class="fas fa-chart-line"></i>
                    {{number_format($teamUser->win * 100 / $teamUser->played)}}%
                  </h3>

                  @elseif($teamUser->played > 0 && $teamUser->win * 100 / $teamUser->played <= 32)
                  <h3><i class="fas fa-thumbs-down"></i>
                    {{number_format($teamUser->win * 100 / $teamUser->played)}}%
                  </h3>
                  @endif

                </div>
                <br>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-right">
              <div class="stat-box ">
                <br>
                <h3>
                  @if($teamUser->total_points==0)
                  <i class="far fa-star-half"></i>
                  {{$teamUser->total_points}}/100
                  @elseif($teamUser->total_points >=1 && $teamUser->total_points <= 99 )
                  <i class="far fa-star-half"></i>
                  {{$teamUser->total_points}}/100
                  @elseif($teamUser->total_points >=100 && $teamUser->total_points <= 199 )
                  <i class="far fa-star"></i><i class="far fa-star-half"></i>
                  {{$teamUser->total_points}}/200
                  @elseif($teamUser->total_points >= 200 && $teamUser->total_points <= 299 )
                  <i class="far fa-star"></i><i class="far fa-star"></i>
                   {{$teamUser->total_points}}/300
                  @elseif($teamUser->total_points >= 300 && $teamUser->total_points <= 399 )
                   <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star-half"></i>
                   {{$teamUser->total_points}}/400
                   @elseif($teamUser->total_points >= 400 && $teamUser->total_points <= 499 )
                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    {{$teamUser->total_points}}/500
                    @elseif($teamUser->total_points >= 500 && $teamUser->total_points <= 999 )
                     <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star-half"></i>
                     {{$teamUser->total_points}}/1000
                     @elseif($teamUser->total_points >= 1000 )
                      <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                      {{$teamUser->total_points}}

                  @endif
                </h3>
              </div>
              <br>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="stat-box">
                  <br>
                  <h3><i  class="fas fa-futbol"></i> {{number_format($teamUser->scored / $teamUser->played, 1, '.', ',')}} +/- {{number_format($teamUser->missed / $teamUser->played, 1, '.', ',')}} </h3>
                </div>
                <br>
              </div>
        

              @else
              @endif

            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
        <div class="jumbotron text-center" style="background:#1c1d22;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img class="" src="/storage/avatar/ufc.png" style="width:150px; height:150px; bottom:20px;  left:10px; border-radius:50%">
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
        <div class="jumbotron text-center" style="background:#1c1d22;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img class="" src="/storage/avatar/2k.png" style="width:150px; height:150px; bottom:20px;  left:10px; border-radius:50%">
              </div>

            </div>
          </div>
        </div>
      </div>



      </div>
    </div>
  </div>

<br>




@endsection
