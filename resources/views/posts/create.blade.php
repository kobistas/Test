@extends('layouts.app')

@section('content')

  <div class="container">
    <br>
    <a href="/posts" class="btn btn-primary">Grįžti</a>
    <br>
    <div class="col-md-12">

      <p>&nbsp;</p>
    </div>
    <h1>Sukurkite naujieną</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
    </div>
    <div class="form-group">

      {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Publikuoti', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
  </div>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h1>Tavo Naujienos ({{$posts->count()}})</h1>
      </div>

      @if(count($posts) >= 1)
      <table>
        <br>

        <br>
        <thead>
          <tr>
            <th scope="col">Pavadinimas</th>
            <th scope="col">Įkelta</th>
            <th scope="col">Publikavo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <td data-label="Pavadinimas"><a href="/posts/{{$post->id}}">{{$post->title}} ({{$post->comments->count()}})</a></td>
            <td data-label="Įkelta">{{$post->created_at}}</td>
            <td data-label="Publikavo">{{$post -> user -> name}}</td>

            <td data-label="Period"> <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Redaguoti</a></td>
            <td data-label="Period">       {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ''])!!}
                   {{Form::hidden('_method', 'DELETE')}}
                   {{Form::submit('Ištrinti', ['class' => 'btn btn-danger'])}}
                   {!!Form::close()!!} </td>

          </tr>
          @endforeach

        </tbody>
      </table>
      @else
      <p>Naujienų nėra</p>
      @endif
  <br>
      <div class="col-xs-12">
  <br>

  <br>
      </div>
  <br>





    </div>

  </div>





@endsection
