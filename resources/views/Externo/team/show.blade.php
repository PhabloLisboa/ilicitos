@extends('template.externo.base')
@section('title', $user->person->name)
@section('main')
<div class="parallax-container">
    <div class="parallax"><img src="{{$user->avatar ? asset('/storage/images').'/'. $user->avatar->path : asset('/storage/images/empty.webp')}}"></div>
</div>

<div class="section white">
    <div class="row container">
        <h2 class="header">{{$user->person->name}}</h2>
        <span>{{date('d/m/Y',strtotime($user->person->born))}}</span>
        <div>
            @if($user->person->description)
                <p>{{$user->person->description}}</p>
            @else
                <p>Uma pessoa de poucas palavras. Não colocou nada aqui ¬¬'</p>
            @endif
        </div>
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

