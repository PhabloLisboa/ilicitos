
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <script src="https://kit.fontawesome.com/b1e0995210.js" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <title>@yield('title')</title>
  </head>
  <body>
    <header>
      <nav class="top-nav black">
        <div class="user-view right pr-2">
        <a href="#!" class="dropdown-trigger" data-target="dropdown1"><img class="circle fit image-top-admin" src="{{Auth::user()->avatar ? asset('/storage/images').'/'.Auth::user()->avatar->path : asset('/storage/images/empty.webp') }}"></a>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!" class="black-text"
                        onclick="event.preventDefault(); document.getElementById('form_logout').submit();">Sair</a></li>
                </ul>

                <form action="{{route('logout')}}" method="POST" id="form_logout" style="display: none">
                    @csrf
                </form>

        </div>
        <a href="#nav-mobile" data-target="nav-mobile"
            class="top-nav sidenav-trigger full hide-on-large-only">
            <i class="fas fa-bars"></i>
        </a>
    </nav>

      <ul id="nav-mobile" class="sidenav sidenav-fixed nav-wrapper">
            <li>
              <div class="user-view center">
                <div class="background black">

                </div>
                <a href="{{route('user.edit', Auth::user()->id)}}" class="justify-center"><img class="circle fit" src="{{Auth::user()->avatar ? asset('/storage/images').'/'.Auth::user()->avatar->path : asset('/storage/images/empty.webp')}}"></a>
                <a href="#"><span class="white-text name">{{Auth::user()->person->name}}</span></a>
                <a href="#"><span class="white-text email">{{Auth::user()->email}}</span></a>
              </div>
            </li>
            <li class="in-menu-item"><a href="/administracao"class="waves-effect waves-black roboto roboto-black">Início</a></li>

            @if(in_array(Auth::user()->sys_role_id,[1,2]))
                <li class="in-menu-item"><a href="{{route('noticias.index')}}" class="waves-effect waves-black roboto roboto-black">Notícias</a></li>
                <li class="in-menu-item"><a href="{{route('agenda.index')}}" class="waves-effect waves-black roboto roboto-black">Agenda</a></li>
                <li class="in-menu-item"><a href="{{route('pecas.index')}}" class="waves-effect waves-black roboto roboto-black">Peças</a></li>
                <li class="in-menu-item"><a href="{{route('galeria.index')}}" class="waves-effect waves-black roboto roboto-black">Galerias</a></li>
            @endif

            @if(in_array(Auth::user()->sys_role_id,[1]))
                <li class="in-menu-item"><a href="{{route('equipe.index')}}"class="waves-effect waves-black roboto roboto-black">Equipe</a></li>
                <li class="in-menu-item"><a href="{{route('sobre.index')}}" class="waves-effect waves-black roboto roboto-black">Sobre</a></li>
                <li class="in-menu-item"><a href="{{route('contato.index')}}" class="waves-effect waves-black roboto roboto-black">Contatos</a></li>
            @endif
      </ul>

    </header>
    <main>
    <div class="container">
        <div class="row">

            <div class="col s12 m8 offset-m1 xl12 offset-xl2 main-admin-container">
                @yield('main')

            </div>

        </div>
    </div>
    </main>


  </body>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {});
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {});
        });
  </script>
  @yield('script')
</html>
