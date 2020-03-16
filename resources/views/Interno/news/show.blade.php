@extends('template.interno.base')
@section('title', $news->title)
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">{{$news->title}}</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="{{route('noticias.edit', $news->id)}}" class="waves-effect waves-black black btn">
                Editar <i class="fas fa-edit"></i>
            </a>
            <a href="#modalDelete" class="modal-trigger waves-effect waves-red red btn">
                Excluir <i class="fas fa-minus-circle"></i>
            </a>
        </div>

         <!-- Modal Structure -->
        <div id="modalDelete" class="modal">
            <div class="modal-content">
            <h4>Tem Certeza?</h4>
            <p>Este ato não poderá ser revertido!</p>
            </div>

            <div class="modal-footer row">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>

            <form method="POST" id="deleteForm" hidden action="{{route('noticias.destroy', $news->id)}}">
                @csrf
                @method('DELETE')
            </form>

            <button  typye="submit" form="deleteForm" class="waves-effect waves-red red btn" style="display:inline-blo">
                Excluir <i class="fas fa-minus-circle"></i>
            </button>
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
    </div>

    <div class="row">
        <div>{!!$news->text!!}</div>
    </div>

    <div class="row">
        <div class="right-align">
            <a href="{{route('noticias.index')}}" class="waves-effect waves-white white color-black btn">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });
    </script>
@endsection
