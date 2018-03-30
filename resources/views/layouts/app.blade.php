
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('css/intro-text-animation.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/table.css')}}">






        <script src="{{asset('js/modernizr.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>



        <title>{{config('app.name')}}</title>


    </head>
    <body>
      @include('inc.navbar')


        @include('inc.messages')

      @yield('content')
      @include('inc.footer')
    </body>

    <!-- Preloader -->
    <div id="preloader">
      <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <!-- /Preloader -->

    <!-- Scripts -->
    <script src="{{asset('js/wow.min.js')}}"></script>
             <script>
             new WOW().init();
             </script>

  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
   <script>
       CKEDITOR.replace( 'article-ckeditor' );
   </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- <script src="assets/js/jquery-2.1.1.js"></script> -->
      <!-- <script src="{{asset('js/jquery.mobile.custom.min.js')}}"></script> -->
        <script src="{{asset('js/main.js')}}"></script>

</html>
