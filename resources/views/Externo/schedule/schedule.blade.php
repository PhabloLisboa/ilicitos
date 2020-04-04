@extends('template.externo.base')
@section('title', 'Agenda')
@section('main')
    <div class="container">
        @if(count($schedules))
        <div class="row">
            @foreach ($schedules as $schedule)
                <a href="{{route('schedule.site.show', $schedule->id)}}">
                <div class="card col s12 l4" >
                    @if($schedule->piece)
                        <div class="card-image valign-wrapper" style="min-height: 15rem;">
                            <img src="{{$schedule->piece->cover}}">
                            <span class="card-title">{{$schedule->piece->name}}</span>
                        </div>
                    @else
                        <div class="card-image valign-wrapper" style="min-height: 15rem;">
                            <img src="{{asset('/storage/images/theater.jpeg')}}">
                            <span class="card-title">Sem peça definida</span>
                        </div>
                    @endif
                    <div class="card-action">
                        <div class="row">
                            <div class="col s6 center-align black-text">
                                <strong>{{$schedule->place}}</strong>
                            </div>
                            <div class="col s6 center-align black-text">
                                <strong>{{date('d/m/Y h:i', strtotime($schedule->date))}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
                <ul class="pagination center-align">
                    <li class="{{$schedules->currentPage() == 1 ? 'disabled' : 'waves-effect'}}"><a href="{{$schedules->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
                    @for ($i = 1; $i <= $schedules->lastPage(); $i++)

                        <li class="{{$i == $schedules->currentPage()? 'active': 'waves-effect waves-back'}}">
                            <a class="waves-effect waves-back" href="?page={{$i}}">{{$i}}</a>
                        </li>

                    @endfor
                    <li class="{{$schedules->lastPage() == $schedules->currentPage() ? 'disabled': 'waves-effect' }}"><a href="{{$schedules->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
        @else
            <h4>Não há nada aqui!</h4>
        @endif
    </div>
@endsection
