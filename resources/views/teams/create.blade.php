@extends('layouts.app')
@section('content')
<div class="container">
<br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
               <b> <p>  Nauja Komanda</p></b>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('teams.store') }}">
                      {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('team_name') ? ' has-error ' : ''}}">
                            <label for="team_name" class="col-md-12 control-label"><b><p> Įvęskite savo PSN - Playstation Network Account Name </p> </b></label>
                            <div class="col-md-6">
                                <input id="team_name" type="text" class="form-control" name="team_name" value="{{ old('team_name') }}">
                                @if ($errors->has('team_name'))
                                  <span class="help-block">
                                    <strong>
                                      {{ $errors->first('team_name') }}
                                    </strong>
                                  </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dalyvauti
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
@endsection
