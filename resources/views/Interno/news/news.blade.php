@extends('template.interno.base')
@section('title', 'Notícias')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Notícias</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="/administracao/noticias/create" class="waves-effect waves-black black btn">
                Adicionar Notícia <i class="fas fa-plus"></i>
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
        <ul class="collection">
            @foreach($news as $i => $new)
            <a href="{{route('noticias.show', $new->id)}}">
            <li class="collection-item avatar {{$i%2 ? 'black white-text' : ''}}">
                <img src="{{$new->image ? asset('/storage/images').'/'.$new->image->path : asset('/storage/images/empty.webp')}}" alt="" class="circle">
                <span class="title">{{$new->title}}</span>
                <p>{{$new->updated_at}}<br>
                   {{$new->author->person->name}}
                </p>
              </li>
            </a>
            @endforeach

        </ul>
        <ul class="pagination center-align">
            <li class="{{$news->currentPage() == 1 ? 'disabled' : 'waves-effect'}}"><a href="{{$news->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
            @for ($i = 1; $i <= $news->lastPage(); $i++)

                <li class="{{$i == $news->currentPage()? 'active': 'waves-effect waves-back'}}">
                    <a class="waves-effect waves-back" href="?page={{$i}}">{{$i}}</a>
                </li>

            @endfor
            <li class="{{$news->lastPage() == $news->currentPage() ? 'disabled': 'waves-effect' }}"><a href="{{$news->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
        </ul>

    </div>



@endsection
