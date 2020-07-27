<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Escuchar y Descargar música Online Mp3 Gratis! - MasMP3s</title>
    <meta name="description" content="Si quieres descargar música mp3 completamente gratis, has llegado al lugar indicado. En MasMP3s, podrás bajar tus canciones favoritas sin problemas." />
    <meta name="keywords" content="musica gratis, mp3 gratis, musica online, descargar musica mp3, descargar mp3 gratis, top 100 semanal, escuchar musica online, bajar musica gratis, bajar mp3s gratis" />

    <link rel="image_src" href="https://i.imgur.com/MF8qwWj.png" />
    <link rel="shortcut icon" type="image/png" href="favicon.icon">
    <meta name="theme-color" content="#2b4272" />
    <meta name="msapplication-navbutton-color" content="#2b4272" />
    <!--styles_start-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/all.min.js') }}" defer></script>
    <script src="{{ asset('js/md5.js') }}" defer></script> -->

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/h_f_app.css') }}" rel="stylesheet">
    

    {{-- <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css"> --}}
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="main.js?v=1594561039"></script> -->
    
</head>
<body>
   
    <div id="app">
        <header id="h">
            <div class="m fa-menu"></div>
            <h2><a href="{{route('home')}}" title="MasMP3s">MasMp3s</a></h2>
            <nav id="n">
                <a href="{{route('artists')}}">Artistas</a>
                <a href="{{route('tubidy')}}">Top 100</a>
                <a href="{{route('gente')}}">Géneros</a>
                <a href="{{route('relac')}}">Relac</a>
            </nav>
        </header>

       
            @yield('content')
      
        
        <footer id="f" data="figure img">

            <div class="tx">

                <ul class="list-unstyled"> 
                    <li class="pull-right"><a href="#top" id="gotop">Ir arriba</a></li>
                    <li><a href="https://web.archive.org/web/20160103155232/http://www.masmp3s.com/">Inicio</a></li>
                    <li><a href="https://web.archive.org/web/20160103155232/http://www.masmp3s.com/terminos/">TOS</a></li>
                    <li><a href="https://web.archive.org/web/20160103155232/http://www.masmp3s.com/contacto/">Contácto</a></li>
                </ul> 

                <p class="pull-right socialize">
                    <a class="facebook" href="https://web.archive.org/web/20160103155232/https://facebook.com/TusMp3" target="_blank" title="MásMP3's en Facebook"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="https://web.archive.org/web/20160103155232/https://twitter.com/TusMP3net" target="_blank" title="@TusMP3net en Twitter"><i class="fa fa-twitter"></i></a>
                    <a class="whatsapp" href="https://web.archive.org/web/20160103155232/https://plus.google.com/106133199385690549851" target="_blank" title="MásMP3's en Google+"><i class="fa fa-whatsapp"></i></a> </p>

                <p>MásMP3's © Derechos reservados 2020 - 2022</p>
                <p>Powered by <a href="https://last.fm/" target="_blank">last.fm</a>.</p>
            </div>

        </footer>

    </div>
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<script>
   $(document).ready(function(){
        $(".d").click(function(){
            $(this).parent().next('.opt').toggle();
        });
   });

   var intervalo;
   clearInterval(intervalo);
   intervalo = window.setInterval(function(){
       var nsec = $(".ons");
       var timeCounter = nsec.text();
       var updateTime = eval(timeCounter) - 1;
       nsec.text(updateTime);
       if(updateTime == -1){
           clearInterval( intervalo );
           $('.opt .oct').remove();
           $('.opt .oc iframe').removeAttr('style');
       }
   }, 1000);
</script>


</body>
</html>
