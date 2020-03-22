@extends('template.interno.base')
@section('title', 'Contatos')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Contatos</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="#modal-create" class="waves-effect waves-black black btn modal-trigger">
                Adicionar Contato <i class="fas fa-plus"></i>
            </a>
        </div>

        <div id="modal-create" class="modal">
            <div class="modal-content">
                <form action="{{route('contato.store')}}" method="POST">
                    @csrf
                    <h4>Adicionar Contato </h4>
                    <div class="input-field">
                        <input type="text" id="contact" required name="contact" />
                        <label for="contact">Contato</label>
                    </div>
                    <select name="type_id">
                        @foreach($contactTypes as $contactType)
                            <option value="{{$contactType->id}}">{{$contactType->description}}</option>
                        @endforeach
                    </select>

                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                        <button type="submit" class="waves-effect waves-black black btn" style="display:inl">
                            Adicionar
                        </button>
                    </div>

                </form>
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

    @foreach ($contacts as $contact)

    @endforeach
    <div class="row">
        <ul class="collection">
            @foreach ($contacts as $contact)
                <li class="collection-item contact">
                    {{$contact->contact}}
                    <div>
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal-{{$contact->id}}"><i class="fas fa-edit"></i>Editar</a>
                        <button form="form-Delete-{{$contact->id}}" class="waves-effect waves-red red btn" type="submit"><i class="fas fa-times"></i>Excluir</button>
                        <form id="form-Delete-{{$contact->id}}" action="{{route('contato.destroy', $contact->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </li>

                <div id="modal-{{$contact->id}}" class="modal">
                    <div class="modal-content">
                        <form action="{{route('contato.update', $contact->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <h4>Editar Contato </h4>
                            <br/>
                            <div class="input-field">
                                <input type="text" id="contact" value="{{$contact->contact}}" required name="contact" />
                                <label for="contact">Contato</label>
                            </div>
                            <select name="type_id">
                                @foreach($contactTypes as $contactType)
                                    <option {{$contact->type_id == $contactType->id ? 'selected' : ''}} value="{{$contactType->id}}">{{$contactType->description}}</option>
                                @endforeach
                            </select>

                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                                <button type="submit" class="waves-effect waves-black black btn">
                                    Atualizar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>


@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });

        document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('select');
            let instances = M.FormSelect.init(elems, {});
        });
    </script>
@endsection
