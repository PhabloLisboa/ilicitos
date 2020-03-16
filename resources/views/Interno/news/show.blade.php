@extends('template.interno.base')
@section('title', $news->title)
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">{{$news->title}}</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="/administracao/noticias/create" class="waves-effect waves-black black btn">
                Adicionar Notícia <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="row">
        <div>{!!$news->text!!}</div>
    </div>
@endsection
