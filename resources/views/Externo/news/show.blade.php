@extends('template.externo.base')
@section('title', $news->title)
@section('main')

<div class="parallax-container">
    <div class="parallax"><img src="{{$news->image ? asset('/storage/images').'/'.$news->image->path : asset('/storage/images/empty.webp')}}"></div>
</div>

<div class="section white">
    <div class="row container">
        <h2 class="header">{{$news->title}}</h2>
        <div>
            {!!$news->text!!}
        </div>
        <span class="black badge white-text">
            {{$news->author->person->name}} - {{date('d/m/Y h:i', strtotime($news->updated_at))}}
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
