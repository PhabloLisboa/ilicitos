@extends('template.interno.base')
@section('title', 'Notícias')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Notícias</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="/administracao/noticias/create" class="waves-effect waves-black black btn">
                Adicionar Notícia <i class="fas fa-plus"></i>
            </a>
        </div>

        @if(session('success'))
                <div class="row">
                    <div class="col s12 offset-m2 pull-l2 card-panel teal white-text center-align">
                        <span>{{session('success')}}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="row">
                    <div class="col s12 offset-m2 pull-l2 card-panel red white-text center-align">
                        <span>{{session('error')}}</span>
                    </div>
                </div>
            @endif

    </div>

    <div class="row">
        <ul class="collection">
            @foreach($news as $new)
            <li class="collection-item avatar">
                <img src="images/yuna.jpg" alt="" class="circle">
                <span class="title">Title</span>
                <p>First Line <br>
                   Second Line
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
              </li>

            @endforeach
          </ul>

    </div>



@endsection
