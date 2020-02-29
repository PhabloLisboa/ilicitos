@extends('template.interno.base')
@section('title', 'Adicionando um novo Ilícito')
@section('main')

    <div class="row">
        <div class="col s12 push-s4 l6 ">
            <h5 class="hedaer-page">Adicionando um novo Ilícito...</h5>
        </div>
    </div>
    @if(session('status'))
        <div class="row">
            <div class="col s12 card-panel teal white-text center-align">
                <span>{{session('status')}}</span>
            </div>
        </div>
    @endif

    <div class="row">
        <form class="col s12 offset-s2 pull-l2" method="POST"  action="{{route('equipe.store')}}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                <input name="name" id="name" type="text" required class="validate">
                <label for="name">Nome *</label>
                </div>
                <div class="input-field col s6">
                <input name="born" id="born" type="date" required class="validate">
                <label for="born">Data de Nascimento *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input name="email" required id="email" type="email" class="validate">
                <label for="email">Email *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->description}}</option>
                        @endforeach
                    </select>
                    <label>Esse é um...</label>
                </div>
            </div>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"></textarea>
                        <label for="description">Breve Descrição</label>
                    </div>
                    </div>
            </div>
            <div class="row">
                <div class="col s12 l4 offset-l8 center-align">
                    <a href="/administracao/equipe" class="waves-effect waves-white white color-black btn">
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
        });
    </script>
@endsection
