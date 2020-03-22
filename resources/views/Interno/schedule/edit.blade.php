@extends('template.interno.base')
@section('title', 'Editar Agenda')
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

        <div class="col s12 m6 offset-m5 offset-l3">
            <div class="card 1 large">
                <div class="card-content center-align">
                    <span class="card-title">Evento</span>

                    <form class="col s12 offset-m2 offset-l2 pull-l2" method="POST"  action="{{route('agenda.update', $schedule->id)}}">
                        @method('PUT')
                        @csrf
                        <input name="place" value="{{$schedule->place}}"id="endereco" type="text" required class="validate">

                        <input name="date" id="date" type="datetime-local" value="{{date("Y/m/d h:i", strtotime($schedule->date))}}" required class="validate">

                        <br/>
                        <input type="number" id="price" value="{{$schedule->price}}" name="price" />
                        <label for="price">Valor da entrada</label>

                        <select name="piece">
                            @foreach($pieces as $piece)
                                <option {{$schedule->piece_id == $piece->id? 'selected': ''}} value="{{$piece->id}}">{{$piece->name}}</option>
                            @endforeach
                        </select>


                </div>
                <div class="card-action center-align">
                    <a href="{{route('agenda.show', $schedule->id)}}" class="waves-effect waves-white white color-black btn">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="waves-effect waves-black black btn">Atualizar</button>
                </div>
                </form>
            </div>
        </div>

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
