@extends('template.interno.base')
@section('title', 'Adicionando um novo Evento')
@section('main')

    <div class="row">
        <div class="col s12 l6 offset-m2">
            <h5 class="hedaer-page">Adicionando uma nova Peça...</h5>
        </div>
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

    <div class="row">
        <form class="col s12 offset-m2 offset-l2 pull-l2" method="POST"  action="{{route('pecas.store')}}">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input name="name" id="name" type="text" required class="validate">
                    <label for="name">Nome da Obra</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 l6">
                    <input name="author" id="author" type="text" required class="validate">
                    <label for="author">Autor</label>
                </div>

                <div class="input-field col s12 l6">
                    <input name="year" id="year" type="number" required class="validate">
                    <label for="year">Ano</label>
                </div>
            </div>

            <div class="row">
                <label for="synopsis">Sinópse</label>
                <textarea name="synopsis" required id="synopsis" class="materialize-textarea"></textarea>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="cover" id="cover" type="text" class="validate">
                    <label for="cover">Capa <small>(coloque algum link aqui)</small></label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 l4 offset-l8 center-align">
                    <a href="{{route('pecas.index')}}" class="waves-effect waves-white white color-black btn">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="waves-effect waves-black black btn">
                        Adicionar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
