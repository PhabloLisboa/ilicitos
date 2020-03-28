@extends('template.interno.base')
@section('title', 'Nova Galeria')
@section('main')

    <div class="row">
        <div class="col s12 l6 offset-m2">
            <h5 class="hedaer-page">Nova Galeria.</h5>
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
        <form class="col s12 offset-m2 offset-l2 pull-l2" enctype="multipart/form-data" method="POST"  action="{{route('galeria.store')}}">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                <input name="name" id="name" type="text" required class="validate">
                <label for="name">Nome *</label>
                </div>
            </div>
            <div class="row">
                <label for="description">Descrição</label>
                <textarea name="description" required id="description" class="materialize-textarea"></textarea>
            </div>

            <div class="row">
                <div class="file-field input-field">
                    <div class="btn black">
                        <span>Imagens</span>
                        <input type="file" name="fotos[]" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder=" Selecione todas de uma só vez!">
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col s12 l4 offset-l8 center-align">
                    <a href="{{route('galeria.index')}}" class="waves-effect waves-white white color-black btn">
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
            let elems = document.querySelectorAll('select');
            let instances = M.FormSelect.init(elems, {});
        });
    </script>
@endsection
