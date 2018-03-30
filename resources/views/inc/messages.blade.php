
@if(count($errors) > 0)
    @foreach($errors->all() as $error)

        <div class="alert alert-danger">
          <b>{{$error}}</b>
        </div>


    @endforeach
@endif

@if(session('success'))

    <div class="alert alert-success">
      <b> {{session('success')}}</b>
    </div>
@endif


@if(session('info'))

    <div class="alert alert-info">


    <b> {{session('info')}}</b>

    </div>
@endif

@if(session('error'))

    <div class="alert alert-danger">
      <b>{{session('error')}}</b>  
    </div>
@endif
