@extends('template.externo.base')
@section('title', 'Evento')
@section('main')
<div class="parallax-container">
    <div class="parallax"><img src="{{$schedule->piece ? $schedule->piece->cover : asset('/storage/images/theater.jpeg')}}"></div>
</div>

<div class="section white">
    <div class="row container">
        <h2 class="header">{{$schedule->piece? $schedule->piece->name: 'Sem peça Definida'}}</h2>
        <div>
            @if($schedule->piece)
                <p>{{$schedule->piece->synopsis}}</p>
            @endif
            <span class="black badge white-text">{{$schedule->place}} -
                {{date('d/m/Y h:i', strtotime($schedule->date))}}</strong>
            <span class="black badge white-text">
                Entrada: R$ {{$schedule->price}}
            </span>
    </div>
</div>


@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, {});
        });
    </script>
@endsection
