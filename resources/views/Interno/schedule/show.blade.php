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

        <div class="col s12 m6 offset-l3">
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
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
                </div>
            </div>
        </div>

    </div>
@endsection
