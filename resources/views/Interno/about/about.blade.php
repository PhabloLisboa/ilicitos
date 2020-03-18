@extends('template.interno.base')
@section('title', 'Notícias')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Sobre</h3>
            <small>Aqui é onde se edita o conteúdo que é apresentado em "Sobre"</small>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="{{route('sobre.edit', $about->id)}}" class="waves-effect waves-black black btn">
                Editar conteúdo <i class="fas fa-edit"></i>
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
        <p>{!!$about->about!!}</p>
    </div>


@endsection
