@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
      <br>
  <h1>Komentarai ({{$commentsCount}})</h1>
      <br>
      <!-- <a href="/posts/create" class="btn btn-primary float-right">Sukurti naujieną</a> -->
      <p> </p>
      <br>
    </div>
    <br>

    <div class="col-xs-12 col-sm-12 col-lg-12">
      <form class="form-horizontal" method="GET" action="{{ route('comments.index') }}">
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


    @if(count($comments) >= 1)
    <table>
      <br>

      <br>
      <thead>
        <tr>
          <th scope="col">Savininkas</th>
          <th scope="col">Komentaras</th>
          <th scope="col">Įkelta</th>
          <th scope="col">Naujiena</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($comments as $comment)
        <tr>
          <td data-label="Savininkas"><b><a href="#">{{$comment -> user -> name}}</a></b></td>
          <td data-label="Komentaras"><b>{{$comment->body}}</b> </td>
          <td data-label="Įkelta"><b>{{$comment->created_at->diffForHumans()}}</b></td>
          <td data-label="Naujiena">{{$comment->post->title}}</td>
          <td data-label="Naujiena"><b>  {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => ''])!!}
                 {{Form::hidden('_method', 'DELETE')}}
                 {{Form::submit('Ištrinti', ['class' => 'btn btn-danger'])}}
                 {!!Form::close()!!}</b></td>






        </tr>
        @endforeach

      </tbody>
    </table>
    @else
    <p>Komentarų nėra</p>
    @endif
<br>
    <div class="col-xs-12">
<br>
      {{$comments->appends(['s'=> $s])->links()}}
<br>
    </div>
<br>
  </div>

</div>



@endsection
