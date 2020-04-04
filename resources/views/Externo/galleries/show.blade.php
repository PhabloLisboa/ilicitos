@extends('template.externo.base')
@section('title', $gallery->title)
@section('main')

<div class="container">
    <div class="row">
        <div class="col s12 center-align">
            <h3>{{$gallery->title}}</h3>
        </div>
        <div class="col s12 center-align">
            <span>{{$gallery->description}}</span>
        </div>
    </div>




    <div class="row" style="margin-top: 2%">
        @foreach ($gallery->images as $image)
            <div class="col s12 m3 l3" style="min-height: 10em; margin-bottom:5%">
                <img class="responsive-img materialboxed"
                    src="{{asset('/storage/images/galleries').'/'.$image->path}}">
            </div>
        @endforeach

    </div>
</div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.materialboxed');
        var instances = M.Materialbox.init(elems, {});
    });
</script>
@endsection
