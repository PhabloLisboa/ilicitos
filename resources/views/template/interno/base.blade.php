
<!DOCTYPE html>
<html lang="en">
  <head>
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
            <a href="#!" class="dropdown-trigger" data-target="dropdown1"><img class="circle fit image-top-admin" src="https://cdn.pixabay.com/photo/2015/10/12/15/16/cat-984367__340.jpg"></a>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!" class="black-text"
                        onclick="event.preventDefault(); document.getElementById('form_logout').submit();">Sair</a></li>
                </ul>

                <form action="{{route('logout')}}" method="POST" id="form_logout" style="display: none">
                    @csrf
                </form>

        </div>
    </nav>
      <div class="container"><a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a></div>
      <ul id="nav-mobile" class="sidenav sidenav-fixed nav-wrapper">
            <li>
              <div class="user-view center">
                <div class="background black">

                </div>
                <a href="#user" class="justify-center"><img class="circle fit" src="https://cdn.pixabay.com/photo/2015/10/12/15/16/cat-984367__340.jpg"></a>
                <a href="#name"><span class="white-text name">Administrador</span></a>
                <a href="#email"><span class="white-text email">{{Auth::user()->email}}</span></a>
              </div>
            </li>
        <li class="in-menu-item"><a href="/administracao/equipe"class="waves-effect waves-black roboto roboto-black">Equipe</a>
            <li class="in-menu-item"><a class="waves-effect waves-black roboto roboto-black">Notícias</a>
            <li class="in-menu-item"><a class="waves-effect waves-black roboto roboto-black">Sobre</a>
            <li class="in-menu-item"><a class="waves-effect waves-black roboto roboto-black">Agenda</a>
            <li class="in-menu-item"><a class="waves-effect waves-black roboto roboto-black">Peças</a>
            <li class="in-menu-item"><a class="waves-effect waves-black roboto roboto-black">Contatos</a>
            <li class="in-menu-item"><a class="waves-effect waves-black roboto roboto-black">Sobre</a>

            </li>

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
  </script>
</html>
