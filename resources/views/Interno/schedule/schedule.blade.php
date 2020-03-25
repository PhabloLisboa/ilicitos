@extends('template.interno.base')
@section('title', 'Agenda')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Agenda</h3>
        </div>
        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="{{route('agenda.create')}}" class="waves-effect waves-black black btn">
                Adicionar Evento <i class="fas fa-plus"></i>
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
    </div>

    <div class="row">
        <ul class="collection">
            @foreach($schedules as $i => $schedule)
            <li class="collection-item avatar {{$i%2 ? 'black white-text' : ''}}">
                <img src="{{$schedule->piece ? $schedule->piece->cover : ''}}" alt="" class="circle">
                <span class="title">{{$schedule->piece ? $schedule->piece->name : 'Sem peça definida'}}</span>
                <p>{{date("d/m/Y h:i", strtotime($schedule->date))}}<br>
                    {{$schedule->place}}
                </p>
                <a href="{{route('agenda.show', $schedule->id)}}" class="secondary-content"><i class="material-icons">Vizualizar</i></a>
            </li>

            @endforeach
        </ul>
    </div>


@endsection
