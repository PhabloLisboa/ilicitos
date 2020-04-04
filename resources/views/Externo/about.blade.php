@extends('template.externo.base')
@section('title', 'Sobre')
@section('main')

    <div class="container">
        @if($about)
            <p>{{$about->about}}</p>

            @if($about->image)
                <img src="{{$about->image}}" alt="Ilícitos">
            @endif
        @else
            <h4>Não há nada aqui</h4>
        @endif
    </div>

@endsection
