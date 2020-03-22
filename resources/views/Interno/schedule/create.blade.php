@extends('template.interno.base')
@section('title', 'Adicionando um novo Evento')
@section('main')

    <div class="row">
        <div class="col s12 l6 offset-m2">
            <h5 class="hedaer-page">Adicionando um novo Evento...</h5>
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
        <form class="col s12 offset-m2 offset-l2 pull-l2" method="POST"  action="{{route('agenda.store')}}">
            @csrf
            <div class="row">
                <div class="input-field col s12 l6">
                <input name="endereco" id="endereco" type="text" required class="validate">
                <label for="endereco">Onde *</label>
                </div>

                <div class="col s12 l6">
                    <label for="date">Quando</label>
                    <input name="date" id="date" type="datetime-local" required class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l6">
                    <select name="piece">
                        @foreach($pieces as $piece)
                            <option value="{{$piece->id}}">{{$piece->name}}</option>
                        @endforeach
                    </select>
                    <label>Peça</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="number" id="price" name="price" />
                    <label for="price">Valor da entrada</label>
                </div>
            </div>



            <div class="row">
                <div class="col s12 l4 offset-l8 center-align">
                    <a href="{{route('agenda.index')}}" class="waves-effect waves-white white color-black btn">
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
