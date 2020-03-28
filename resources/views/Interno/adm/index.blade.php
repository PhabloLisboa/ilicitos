@extends('template.interno.base')
@section('main')
    <div class="row">
        @if(!count($schedule))
            Não há Eventos marcados!
        @else
            <div class="carousel carousel-adm black white-text carousel-slider center">
                @foreach($schedule as $i => $evento)
                    @if ($i<= 4)
                        <div class="carousel-item center">
                            <p>
                                {{date("d/m/Y h:i", strtotime($evento->date))}}<br/>
                            </p>
                            <p>
                                {{$evento->piece ? $evento->piece->name : 'Sem peça definida'}}
                            </p>
                        </div>
                    @endif
                @endforeach
             </div>
        @endif
    </div>
    <div class="row center-align">
        <h3>Temos...</h3>
        <div class="col s12 l4">
            <h1 class="indigo-text darken-4">{{count($team)}}</h4>
            <strong>Pessoas na nossa equipe</strong>
        </div>
        <div class="col s12 l4">
            <h1 class="blue-text accent-4">{{count($news)}}</h4>
            <strong>Notícias Cadastradas</strong>
        </div>
        <div class="col s12 l4">
            <h1 class="blue-text accent-4">{{count($pieces)}}</h4>
            <strong>Peças no Repertório</strong>
        </div>
    </div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const elems = document.querySelector('.carousel');
    const instances = M.Carousel.init(elems, {
        dist: 0,
        fullWidth: true,}
        );

    setInterval(()=>{
        instances.next()
    }, 6000)

    });

    window.onload = () => {
        document.querySelector('.carousel-adm').style.height = "20vh"
    }

</script>

@endsection
