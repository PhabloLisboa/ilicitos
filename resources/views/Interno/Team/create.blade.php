@extends('template.interno.base')
@section('title', 'Adicionando um novo Ilícito')
@section('main')
    <div class="row">
        <a href="/administracao/equipe" class="waves-effect waves-black black btn">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>


    <div class="row">
        <form class="col s12" method="POST"  action="{{route('equipe.store')}}">
            @csrf
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Ilícito da Silva Pereira"
                name="name" id="name" type="text" class="validate">
            <label for="name">Nome</label>
            </div>
            <div class="input-field col s6">
            <input name="born" id="born" type="date" class="validate">
            <label for="born">Data de Nascimento</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input name="born" id="born" type="date" class="validate">
            <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
            </div>
        </div>
        </form>
    </div
@endsection
