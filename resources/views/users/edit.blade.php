@extends('layouts.app')

@section('content')
<div class="">
  <div class="container">
    <br>
    <a href="/" class="btn btn-primary">Grįžti</a>
    <br>
    <div class="col-md-12">

      <p>&nbsp;</p>
    </div>
    <h1>Vartotojas : {{$user->name}}</h1>
    <div class="form-group">
      <img class="avatar-hidden-max" src="/storage/avatar/{{$user->avatar}}" style="width:100px; height:100px; bottom:20px;  left:10px; border-radius:50%">

    </div>
    @if (Auth::user())
    {!! Form::open(['action' => ['UsersController@update',$user->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

      {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Vardas'])}}
    </div>
    <div class="form-group">
      {{Form::text('ban', $user->ban, ['class' => 'form-control', 'placeholder' => 'Bano Statusas'])}}
    </div>
    <div class="form-group">
      {{Form::text('isModerator', $user->isModerator, ['class' => 'form-control', 'placeholder' => 'Bano Statusas'])}}
    </div>
    <div class="form-group">
      {{Form::file('avatar')}}
      <b><p>Idealus ikeliamas jusu image butu 250x250</p></b>
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Publikuoti', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    @endif
    <br>
  </div>

</div>



@endsection
