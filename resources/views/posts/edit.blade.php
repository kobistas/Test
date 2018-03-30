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
    <h1>Redaguokite naujieną</h1>
    {!! Form::open(['action' => ['PostsController@update',$post->id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">

      {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
    </div>
    <div class="form-group">

      {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Publikuoti', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
  </div>

</div>



@endsection
