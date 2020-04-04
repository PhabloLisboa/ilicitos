<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/font.css')}}">
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">

        <script src="href="{{asset('js/materialize.min.js')}} crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/b1e0995210.js" crossorigin="anonymous"></script>

        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper black p-side-20">
                <a href="#" class="brand-logo center hide-on-med-and-down roboto-black it-logo">IT</a>
                <a href="#" data-target="mobile-demo" class="brand-logo center sidenav-trigger roboto-black it-logo">IT</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="/" class="menu-item">INÍCIO</a></li>
                    <li><a href="/sobre" class="menu-item">SOBRE</a></li>
                    <li><a href="/noticias" class="menu-item">NOTÍCIAS</a></li>
                </ul>


                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/agenda" class="menu-item">AGENDA</a></li>
                    <li><a href="/equipe" class="menu-item">EQUIPE</a></li>
                    <li><a href="{{route('galleries')}}" class="menu-item">GALERIA</a></li>
                </ul>

                </div>

                <ul class="sidenav" id="mobile-demo">
                    <li><a href="/" class="menu-item">INÍCIO</a></li>
                    <li><a href="{{route('about')}}" class="menu-item">SOBRE</a></li>
                    <li><a href="{{route('news')}}" class="menu-item">NOTÍCIAS</a></li>
                    <li><a href="{{route('schedule')}}" class="menu-item">AGENDA</a></li>
                    <li><a href="{{route('team')}}" class="menu-item">EQUIPE</a></li>
                    <li><a href="{{route('galleries')}}" class="menu-item">Galeria</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('main')
        </main>
        <footer class="page-footer black">
            <div class="container">
            <div class="row">
                <div class="col l6 s12">
                <h5 class="white-text">Contato</h5>
                <ul>
                    @foreach (App\Models\Contact::all() as $contact)
                        <li>
                            @if($contact->type_id == 1)
                                <i class="fas fa-at"></i> {{$contact->contact}}
                            @elseif($contact->type_id == 2)
                                <i class="fas fa-phone"></i> {{$contact->contact}}
                            @else
                                <i class="fas fa-id-card"></i> {{$contact->contact}}
                            @endif
                        </li>
                    @endforeach
                </ul>

                </div>
                <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Socias</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fas fa-at"></i> Email</a></li>
                </ul>

                <a href="{{route('login')}}">Administração</a>
                </div>
            </div>
            </div>
            <div class="footer-copyright">
            <div class="container">
            © 2020 Copyright - Ilícitos Teatro
            <a class="grey-text text-lighten-4 right" href="https://github.com/PhabloLisboa">Developed by Phablo <i class="far fa-address-card"></i></a>
            </div>
            </div>
        </footer>
    </body>
    @include('script')
    @yield('script')
</html>
