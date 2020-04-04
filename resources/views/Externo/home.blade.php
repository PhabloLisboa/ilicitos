@extends('template.externo.base')
@section('title', 'Ilícitos Teatro')
@section('main')
    <link rel="stylesheet" href="{{asset('css/glide.core.min.css')}}">
    <script src="{{asset('js/glide.min.js')}}"></script>



    <div class="row">
        @if(!count($schedule))
            Não há Eventos marcados!
        @else
            <div class="carousel carousel-home black white-text carousel-slider center">
                @foreach($schedule as $i => $evento)
                    @if ($i<= 4)
                        <div class="carousel-item center">
                            <p class="flow-text">
                                {{date("d/m/Y h:i", strtotime($evento->date))}}
                            </p>
                            <p class="flow-text" >
                                {{$evento->piece ? $evento->piece->name : 'Sem peça definida'}}
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @foreach($news as $i => $new)
                            @if ($i<= 4)
                                <li class="glide__slide">
                                    <a href="#" class="black-text">
                                    <div class="row">
                                        <div class=" col s12 l5 div-img-slide"style="height: 100%">
                                            <img class="responsive-img center" src="{{$new->image ? asset('/storage/images').'/'.$new->image->path : asset('/storage/images/empty.webp')}}" alt="">
                                        </div>
                                        <div class="col s12 l5">
                                            <div class="row title-carousel">
                                                <h5>{{$new->title}}</h5>
                                            </div>

                                            <div class="row text-carousel">
                                                {!!$new->text!!}
                                            </div>

                                            <div class="row">
                                                <blockquote>
                                                    {{$new->author->person->name}} - {{date("d/m/Y h:i", strtotime($new->updated_at))}}
                                                </blockquote>
                                            </div>
                                        </div>

                                    </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="glide-photos">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @foreach($galleries[rand(0, count($galleries)-1)]->images as $image)
                        <a href="{{route('show.photos',$image->gallery->id)}}">
                            <img class="responsive-img"
                            src="{{asset('/storage/images/galleries').'/'.$image->path}}">
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>

    if(document.querySelector('.glide')){
        new Glide('.glide', {
            type: 'carousel',
            autoplay: 10000,
            hoverpause: false,
            rewindDuration:2000,
        }).mount()}

    new Glide('.glide-photos', {
        type: 'carousel',
        autoplay: 10000,
        perView: 4,
        breakpoints: {
            800: {
            perView: 2
            },
            480: {
            perView: 1
            }
        },
        hoverpause: false,
        rewindDuration:2000,
    }).mount()



    document.addEventListener('DOMContentLoaded', function() {
    const elems = document.querySelector('.carousel-home');
    const instances = M.Carousel.init(elems, {
        dist: 0,
        fullWidth: true,}
        );

    setInterval(()=>{
        instances.next()
    }, 6000)

    });

    window.onload = () => {
        document.querySelector('.carousel-home').style.height = "15vh"
    }




</script>

@endsection


