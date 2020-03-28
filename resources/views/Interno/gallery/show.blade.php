@extends('template.interno.base')
@section('title', $gallery->title)
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 push-m2 center-align l6 ">
            <h3 class="hedaer-page">{{$gallery->title}}</h3>
        </div>


        <div class="col s12 l6 pt-1 right-align">
            <a href="#modal-update" class="waves-effect waves-black black btn modal-trigger">
                Editar <i class="fas fa-plus"></i>
            </a>

            <a href="#modal-add" class="waves-effect waves-black black btn modal-trigger">
                Adicionar Imagem <i class="fas fa-plus"></i>
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

        <div id="modal-update" class="modal">
            <div class="modal-content">
                <form action="{{route('galeria.update', $gallery->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <h4>Atualizar {{$gallery->title}}</h4>
                    <div class="input-field">
                        <input type="text" id="title" value='{{$gallery->title}}' required name="title" />
                        <label for="title">Nome</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="description" value='{{$gallery->description}}' required name="description" />
                        <label for="description">Descrição</label>
                    </div>

                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                        <button type="submit" class="waves-effect waves-black black btn" style="display:inl">
                            Atualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div id="modal-add" class="modal">
            <div class="modal-content">
                <form enctype="multipart/form-data" action="{{route('galeria.add', $gallery->id)}}" method="POST">
                    @csrf
                    <h4>{{$gallery->title}}</h4>
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

                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                        <button type="submit" class="waves-effect waves-black black btn" style="display:inl">
                            Adicionar
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <span>{{$gallery->description}}</span>


    <div class="row" style="margin-top: 2%">
        @foreach ($gallery->images as $image)
            <div class="col s12 m3 l3" style="min-height: 10em; margin-bottom:5%">
                <img class="responsive-img materialboxed" id="item-{{$gallery->id}}"
                    src="{{asset('/storage/images/galleries').'/'.$image->path}}">
            </div>
        @endforeach

    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems, {});
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });

    </script>
@endsection
