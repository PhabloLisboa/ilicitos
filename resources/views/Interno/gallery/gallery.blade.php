@extends('template.interno.base')
@section('title', 'Galerias')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Galerias</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="{{route('galeria.create')}}" class="waves-effect waves-black black btn">
                Adicionar Galeria <i class="fas fa-plus"></i>
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

            @foreach($galleries as $gallery)
            <div class="col s12 l8 push-l2 mt-5">
                <a href="{{route('galeria.show', $gallery->id)}}" >
                    <span class="center-align">{{$gallery->title}}</span>
                    <br/>
                    <img class="responsive-img thumb" id="item-{{$gallery->id}}" style="min-width: 100%"
                        src="{{asset('/storage/images/galleries').'/'.$gallery->images[rand(0, count($gallery->images)-1)]->path}}">
                </a>
            </div>
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
@endsection

