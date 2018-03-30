@extends('layouts.app')


@section('content')
<div class="s-hero">
  <br>
  <div class="container">
    <div class="row">
        <div class="jumbotron text-center" style="background:#1c1d22;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-lg-12">


                <br>

                <p style="color:#888;">Sveiki atvykę į stipriausią Lietuvoje e-sporto turnyrą, skatinanti domėtis ir užsiimti sportu. Kviečiame jus prisijungti ir sudalyvauti. </p>

                <p style="color:#888;"> </p>


                <!-- <p style="color:#888;">Norint matyti pilną svėtainės turinį, turite prisijungti su facebook vartojo paskyra. </p> -->

              </div>
              <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img class="img-responsive" style="width:160px"; src="/storage/cover_images/logo.png">
              </div> -->
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="intro-app fluid-responsive">
                      <section class="rw-wrapper">
                      <h2 class="rw-sentence center">
                        <div class="rw-words rw-words-1">
                          <span>FIFA</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18</span>
                          <span></span>
                          <span class="">NBA</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2k</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18</span>
                          <span></span>
                          <span>UFC</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3</span>
                          <span></span>
                        </div>
                      </h2>
                    </section>
                    <br>
                </div>
              </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <!-- <div class="wow shake data-wow-duration="6s" data-wow-delay="6s""> -->

              @guest
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                &nbsp; <a href="{{route('fb.auth')}}" class="button alt scrolly ">facebook</a>&nbsp;
                  <a href="{{route('teams.index')}}" class="button alt scrolly "> FIFA18</a>
                </form>
              @else
              <a href="{{route('teams.index')}}" class="button alt scrolly "> FIFA18</a>
              @endguest
            <p></p>  <!-- </div> -->

            </div>

              <!-- <div class="col-xs-12 col-sm-3">
                <div class="wow fadeInUp data-wow-duration="6s" data-wow-delay="2.5s"">

                  <h2 style="color:#888;"><i class="fas fa-users"></i></h2><p> 3,452 vartotojai</p>
                </div>
              </div>
              <div class="col-xs-12 col-sm-3">
                <div class="wow fadeInUp data-wow-duration="6s" data-wow-delay="2.5s"">
                  <h2 style="color:#888;"><i class="fas fa-gamepad"></i></h2><p> 123,000 sužaista</p>

                </div>
              </div>
              <div class="col-xs-12 col-sm-3">
                <div class="wow fadeInUp data-wow-duration="6s" data-wow-delay="2.5s"">
                  <h2 style="color:#888;"><i class="fas fa-file-alt"></i></h2><p> 1,240 naujienos</p>

                </div>
              </div>
              <div class="col-xs-12 col-sm-3">
                <div class="wow fadeInUp data-wow-duration="6s" data-wow-delay="2.5s"">
                  <h2 style="color:#888;"><i class="fas fa-trophy"></i></h2><p> 3 turnyrai</p>

                </div>
              </div> -->



          </div>
        </div>

      </div>





      </div>
    </div>
  </div>

<br>

<div class="container">
  <div class="row">


    <!-- <div class="col-xs-12 col-sm-6 ">
        <img src="https://apollo2.dl.playstation.net/cdn/UP1001/CUSA08500_00/FREE_CONTENThRUmvsFocbmGUAVhw7iH/PREVIEW_SCREENSHOT1_148936.jpg" alt="" style="width:100%;">
      <h4><a href="#">„Cavaliers“ toliau sprogdina sudėtį: komandą palieka Wade'as, Shumpertas, Crowderis ir Rose'as (5)</a></h4>

    </div>
    <div class="col-xs-12 col-sm-6 ">
        <img src="https://cdn.vox-cdn.com/thumbor/z8wlV4HVIOQGXA6IexWMQxHPLQE=/0x0:1951x1080/1200x800/filters:focal(820x384:1132x696)/cdn.vox-cdn.com/uploads/chorus_image/image/57724141/GRIEZMAN_STRIKE_FULLRES_AUG16_WM.0.jpg" alt="" style="width:100%;">
      <h4><a href="#">„Cavaliers“ toliau sprogdina sudėtį: komandą palieka Wade'as, Shumpertas, Crowderis ir Rose'as (5)</a></h4>

    </div> -->

    <!-- <div class="col-xs-12 col-sm-6 col-lg-3">
        <img src="https://apollo2.dl.playstation.net/cdn/UP0006/CUSA06536_00/FREE_CONTENTVmmOQdc5GBop7uZDW51w/PREVIEW_SCREENSHOT3_157995.jpg" alt="" style="width:100%;">
        <h4><a href="#">„Cavaliers“ toliau sprogdina sudėtį: komandą palieka Wade'as, Shumpertas, Crowderis ir Rose'as (5)</a></h4>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-3">
        <img src="https://cdn.mos.cms.futurecdn.net/rNEvEF8RsCyYn9fSkdPK3W.jpg" alt="" style="width:100%;">
        <h4><a href="#">„Cavaliers“ toliau sprogdina sudėtį: komandą palieka Wade'as, Shumpertas, Crowderis ir Rose'as (5)</a></h4>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-3">
        <img src="https://cdn.gamer-network.net/2017/usgamer/FIFA-17-Barcelona.jpg" alt="" style="width:100%;">
        <h4><a href="#">„Cavaliers“ toliau sprogdina sudėtį: komandą palieka Wade'as, Shumpertas, Crowderis ir Rose'as (5)</a></h4>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-3">
        <img src="https://apollo2.dl.playstation.net/cdn/UP1001/CUSA08500_00/FREE_CONTENThRUmvsFocbmGUAVhw7iH/PREVIEW_SCREENSHOT1_148936.jpg" alt="" style="width:100%;">
        <h4><a href="#">„Cavaliers“ toliau sprogdina sudėtį: komandą palieka Wade'as, Shumpertas, Crowderis ir Rose'as (5)</a></h4>
    </div> -->


    @if(count($posts) >= 1)
  @foreach ($posts->slice(0, 2) as $post)
    <div class="col-xs-12 col-sm-6">
          <a href="/posts/{{$post->id}}"><img href="/posts/{{$post->id}}" style="width:100%" src="/storage/cover_images/{{$post->cover_image}}"></a>
        <h4><a href="/posts/{{$post->id}}">{{$post->title}} ({{$post->comments->count()}})</a></h4>
    </div>
    <br>
    @endforeach
    @else
    <p><b>Naujienų nėra</b> </p>
    @endif


    @if(count($posts) >= 1)
  @foreach ($posts->slice(2) as $post)
    <div class="col-xs-12 col-sm-6 col-lg-3">
        <a href="/posts/{{$post->id}}"><img href="/posts/{{$post->id}}" style="width:100%" src="/storage/cover_images/{{$post->cover_image}}"></a>
        <h4><a href="/posts/{{$post->id}}">  {{$post->title}} ({{$post->comments->count()}})</a></h4>
    </div>
    <br>
    @endforeach

    @endif
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          {{$posts->links()}}

        </div>

      </div>

    </div>





  </div>
  <br>

</div>
@endsection
