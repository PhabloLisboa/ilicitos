@extends('template.externo.base')
@section('title', 'Notícias')
@section('main')
<div class="container">
    @if(count($news))
    <div class="row">
        @foreach ($news as $new)
            <a href="{{route('news.site.show', $new->id)}}">
            <div class="card col s12 l4" >
                <div class="card-image valign-wrapper" style="min-height: 15rem;">
                    <img src="{{$new->image ? asset('/storage/images').'/'.$new->image->path : asset('/storage/images/theater.jpeg')}}">
                    <span class="card-title">{{$new->title}}</span>
                </div>

                <div class="card-action">
                    <div class="row center-align">

                            <strong>{{$new->author->person->name}} - {{date('d/m/Y h:i', strtotime($new->updated_at))}}</strong>

                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div>
            <ul class="pagination center-align">
                <li class="{{$news->currentPage() == 1 ? 'disabled' : 'waves-effect'}}"><a href="{{$news->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
                @for ($i = 1; $i <= $news->lastPage(); $i++)

                    <li class="{{$i == $news->currentPage()? 'active': 'waves-effect waves-back'}}">
                        <a class="waves-effect waves-back" href="?page={{$i}}">{{$i}}</a>
                    </li>

                @endfor
                <li class="{{$news->lastPage() == $news->currentPage() ? 'disabled': 'waves-effect' }}"><a href="{{$news->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
    @else
        <h4>Não há nada aqui!</h4>
    @endif
</div>
@endsection
