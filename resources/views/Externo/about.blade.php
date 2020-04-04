@extends('template.externo.base')
@section('title', 'Sobre')
@section('main')
    <div class="container">
        <p>{{$about->about}}</p>

        @if($about->image)
            <img src="{{$about->image}}" alt="Ilícitos">
        @endif
    </div>

@endsection
