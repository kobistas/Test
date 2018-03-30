@extends('layouts.app')

@section('content')
<div class="s-hero">
  <br>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="jumbotron text-center" style="background:#1c1d22;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <br>
                <p style="color:#888;">Čia galite pasikeisti savo avatar paveiksliuką, kurį matys kiti vartotojai, stebintis jūsų statistiką. Patartume naudoti 250x250 avatarus. </p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <img class="" src="/storage/avatar/{{$user->avatar}}" style="width:150px; height:150px; bottom:20px;  left:10px; border-radius:50%">
              </div>


            </div>
          </div>
        </div>

      </div>





      </div>
    </div>
  </div>

<br>

<div class="jumbotron text-center">
  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="form-group">
        {!! Form::open(['action' => ['UsersController@update',$user->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::label('title', 'Pakeiskite savo facebook vardą į PSN - Playstation Network Account Name ')}}
        <!-- {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Vardas'])}} -->
      </div>
      {{Form::file('avatar')}}
      {{Form::hidden('_method','PUT')}}
      {{Form::submit('Išsaugoti', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
    </div>

  </div>

</div>


@endsection
