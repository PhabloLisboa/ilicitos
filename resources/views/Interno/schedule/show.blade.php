@extends('template.interno.base')
@section('title', 'Agenda')
@section('main')
    <div class="row">

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
        <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Está certo disso?</h4>
              <p>Esse ato não pode ser desfeito!</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                <button type="submit" form="formDelete" class="waves-effect waves-red red btn">Excluir</button>
                <form id="formDelete" action="{{route('agenda.destroy', $schedule->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
          </div>

        <div class="col s12 m6 offset-m5 offset-l3">
            <div class="card 1 large">
                <div class="card-content center-align">
                    <span class="card-title">Evento</span>
                    <b><small>{{date("d/m/Y h:i", strtotime($schedule->date))}}</small></b>
                    <p>{{$schedule->place}}</p>
                    <br/>
                    <div class="card-image">
                        <img src="{{$schedule->piece->cover}}">
                    </div>
                    <h5 class="">{{$schedule->piece->name}}</h5>
                </div>

                <div class="card-action center-align">

                    <a href="{{route('agenda.edit', $schedule->id)}}" class="waves-effect waves-white white color-black btn">
                        Editar <i class="fas fa-edit"></i>
                    </a>

                    <a href="#modal1" class="waves-effect waves-red red btn  modal-trigger">Excluir</a>


                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, {});
        });
    </script>

@endsection
