@extends('template.interno.base')
@section('title', $user->person->name)
@section('main')

    <div class="row">
        <div class="col s12 l6 offset-m2">
            <h5 class="hedaer-page">{{$user->person->name}}.</h5>
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
        <form class="col s12 offset-m2 offset-l2 pull-l2" method="POST"  action="{{route('user.update', $user->id)}}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="input-field col s12 l6">
                    <input name="name" id="name" value='{{$user->person->name}}' type="text" required class="validate">
                    <label for="name">Nome</label>
                </div>

                <div class="col s12 l6">
                    <label for="born">Data de Nascimento</label>
                    <input name="born"  value='{{$user->person->born}}' id="born" type="date" required class="validate">
                </div>
            </div>
            <div class="row">
                <label for="email">E-mail</label>
                <input name="email" id="email" value='{{$user->email}}' type="email" required class="validate">
            </div>
            <div class="row">
                <label for="description">Descrição</label>
                <textarea name="description" required id="description" class="materialize-textarea">{{$user->person->description ? $user->person->description : ''}}</textarea>
            </div>

            <div class="row change-password hide">
                <div class="input-field col s12 l6">
                    <input name="old-password" id="old-password" type="password" required class="validate">
                    <label for="old-password">Senha Atual</label>
                </div>

                <div class="input-field col s12 l6">
                    <input name="new-password" id="new-password" type="password" required class="validate">
                    <label for="new-password">Nova Senha</label>
                </div>
            </div>

            <div class="row center-align center">
                <div class="switch password">
                    <label>
                    <input type="checkbox">
                    <span class="lever"></span>
                    Alterar Senha
                    </label>
                </div>
            </div>

            <div class="row">

                <div class="col s12 l4 offset-l8 center-align">
                    <a href="/administracao" class="waves-effect waves-white white color-black btn">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="waves-effect waves-black black btn">
                        Atualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        let contentPass = document.querySelector('.change-password')
        document.querySelector('.password').addEventListener('change', e => {

            if(!e.target.checked){
                contentPass.classList.add('hide')
                document.querySelector('#old-password').disabled = true
                document.querySelector('#new-password').disabled = true
            }else{
                contentPass.classList.remove('hide')
                document.querySelector('#old-password').disabled = false
                document.querySelector('#new-password').disabled = false
            }
        })
    </script>
@endsection
