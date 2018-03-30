@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
      <br>
  <h1>Naujienos ({{$postsCount}})</h1>
      <br>
      <a href="/posts/create" class="btn btn-primary float-right">Sukurti naujieną</a>
      <p> </p>
      <br>
    </div>
    <br>

    <div class="col-xs-12 col-sm-12 col-lg-12">
      <form class="form-horizontal" method="GET" action="{{ route('posts.index') }}">
        {{ csrf_field() }}
      <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-lg-12">
                  <input id="s" type="text" class="form-control" name="s" placeholder="Paieška" value="{{ isset($s) ? $s : '' }}">
              </div>
          </div>


          <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">
                    Ieškoti
                  </button>
              </div>
          </div>
      </form>
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

          <td data-label=""> <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Redaguoti</a>   </td>
          <td data-label="">       {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ''])!!}
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
      {{$posts->appends(['s'=> $s])->links()}}
<br>
    </div>
<br>
  </div>

</div>



@endsection
