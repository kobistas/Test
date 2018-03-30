@extends('layouts.app')

@section('content')
<div class="container">
  <br>
  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

      <h1>{{ $post->title}}</h1>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="container">
              <img style="width:100%"; src="/storage/cover_images/{{$post->cover_image}}">

            </div>
          </div>
          <div class="col-xs-12 col-sm-12">
            <p>{!!$post->body!!}</p>

          </div>
        </div>
      </div>


    </div>





    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

      <ul class="list-group">
        @if (Auth::guest())
        <li class="list-group-item">
          <div class="form-group">
            <p><b>  Prisijunk ir dalyvauk diskusijoje </b></p>
            <!-- @if ($post->comments->count() >= 5)
            <p><b> Iš viso komentarų : ({{$post->comments->count()}}) </b></p>
            @endif -->
          </div>
        </li>
    		@else
        <form class="form-horizontal" method="POST" action="/posts/{{$post->id}}/comments">
          {{ csrf_field() }}

        <li class="list-group-item">
            <div class="form-group {{ $errors->has('body') ? ' has-error ' : ''}}">

              <!-- <textarea id="body" type="text" name="body" placeholder="Jūsų komentaras" class="form-control" value="{{ old('body') }}"></textarea> -->
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
              <!-- @if ($post->comments->count() >= 5)
              <p><b> Iš viso komentarų : ({{$post->comments->count()}}) </b></p>
              @endif -->
            </div>

        </li>
        <div class="">


            <div class="comment-background">

              <button type="submit" class="button alt scrolly commentcenter">
                Publikuoti komentarą
              </button>

            </div>


        </div>
      </form>
          @endif
        @if(count($post->comments) >= 1)
        @foreach ($post->comments as $comment)

          <li class="list-group-item">
            <strong class="float-left" style="color:#c0c0c0;"><a href="
              #
              ">{{$comment->user->name}}</a></strong>
            <br>
            <b>{{$comment->body}}</b>
            <br>

            <strong class="float-right" style="color:#c0c0c0;">{{$comment->created_at->diffForHumans()}}</strong>
          </li>
        @endforeach
        @else
        <li class="list-group-item">

          <br>
          <p><b>Komentarų nėra</b></p>
        </li>

        @endif
      </ul>
      <br>
      {{ $post->comments->links() }}
      <br>
    </div>

    <!-- @if(!Auth::guest())
      @if(Auth::user()->id == $post->user_id)
      <div class="col-md-12 col-md-offset-4">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Redaguoti</a> &nbsp;

        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-left'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Ištrinti', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}

      </div>

      @endif
    @endif -->
  </div>
  <br>
</div>
@endsection
