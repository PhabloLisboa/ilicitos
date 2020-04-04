@extends('template.externo.base')
@section('title', 'Galerias')
@section('main')
    <div class="container">
        @if(count($galleries))
    <div class="row">
        @foreach ($galleries as $gallery)
            <a href="{{route('show.photos', $gallery->id)}}">
            <div class="card col s12 l4" >
                <div class="card-image valign-wrapper" style="min-height: 15rem;">
                    <img src="{{asset('/storage/images/galleries').'/'.$gallery->images[rand(0, count($gallery->images)-1)]->path}}">
                    <span class="card-title">{{$gallery->title}}</span>
                </div>
            </div>
            </a>
        @endforeach
    </div>
            <ul class="pagination center-align">
                <li class="{{$galleries->currentPage() == 1 ? 'disabled' : 'waves-effect'}}"><a href="{{$galleries->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
                @for ($i = 1; $i <= $galleries->lastPage(); $i++)

                    <li class="{{$i == $galleries->currentPage()? 'active': 'waves-effect waves-back'}}">
                        <a class="waves-effect waves-back" href="?page={{$i}}">{{$i}}</a>
                    </li>

                @endfor
                <li class="{{$galleries->lastPage() == $galleries->currentPage() ? 'disabled': 'waves-effect' }}"><a href="{{$galleries->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
    @else
        <h4>Não há nada aqui!</h4>
    @endif
    </div>

@endsection

