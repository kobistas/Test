@extends('layouts.app')
@section('content')
<div class="s-hero">
  <div class="container">
    <br>
    <a class="btn btn-primary" href="/teams">Grįžti</a>
    <br>
    <br>
    <span class="verchata"><p>Rezultatai turi būti rašomi atsakingai. Rezultatą rašo laimėjęs. Jei lygiosios, rašo namų komanda rezultatą.</p></span>

    <br>

  </div>

</div>
<div class="container">
<br>
    <div class="row">
        <div class="col-md-12">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('results.store') }}">
                      {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('home_team') ? ' has-error ' : ''}}">
                          <label for="exampleSelect1" class="col-md-4 control-label"><b>Jūsų Komanda</b>  </label>
                          <div class="col-md-12">
                          <select name="home_team" class="form-control" id="exampleSelect1">


                            <option value="{{$teamUser->id}}">


                              {{$teamUser->team_name  }}</option>

                          </select>
                          @if ($errors->has('home_team'))
                            <span class="help-block">
                              <strong>
                                {{ $errors->first('home_team') }}
                              </strong>
                            </span>
                          @endif
                        </div>
                        </div>






                        <div class="form-group {{ $errors->has('home_score') ? ' has-error ' : ''}}">
                                <label for="home_score" class="col-md-4 control-label"><b>Jūsų įmušti įvarčiai</b></label>
                                <div class="col-md-12">
                                    <input id="home_score" type="text" class="form-control" name="home_score" value="{{ old('home_score') }}">
                                    @if ($errors->has('home_score'))
                                      <span class="help-block">
                                        <strong>
                                          {{ $errors->first('home_score') }}
                                        </strong>
                                      </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('away_score') ? ' has-error ' : ''}}">
                                    <label for="away_score" class="col-md-4 control-label"><b>Varžovo įmušti įvarčiai</b></label>
                                    <div class="col-md-12">
                                        <input id="away_score" type="text" class="form-control" name="away_score" value="{{ old('away_score') }}">
                                        @if ($errors->has('away_score'))
                                          <span class="help-block">
                                            <strong>
                                              {{ $errors->first('away_score') }}
                                            </strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>




                            <div class="form-group {{ $errors->has('away_team') ? ' has-error ' : ''}}">
                              <label for="exampleSelect1" class="col-md-4 control-label"><b>Varžovo Komanda</b></label>
                              <div class="col-md-12">
                              <select name="away_team" class="form-control" id="exampleSelect1">

                                @foreach ($teams as $team)
                                <option value="{{$team->id}}">{{$team->team_name  }} {{$team->user->name}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('away_team'))
                                <span class="help-block">
                                  <strong>
                                    {{ $errors->first('away_team') }}
                                  </strong>
                                </span>
                              @endif
                            </div>
                            </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Įrašyti rezultatą
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
