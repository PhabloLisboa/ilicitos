@extends('template.interno.base')
@section('title', 'Adicionando Notícia')
@section('main')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div class="row">
        <div class="col s12 l6 offset-m2">
            <h5 class="hedaer-page">Adicionando Notícia...</h5>
        </div>
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

    <div class="row">
        <form  method="POST"  action="{{route('noticias.store')}}">
            @csrf


            <div class="row">
                <div class="input-field col s12">
                <input name="title" required id="title" type="text" class="validate">
                <label for="title">Título *</label>
                </div>
            </div>

            <div id="editor">

                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>

const toolbarOptions = [
        [{ 'font': [] }, { 'size': [] }],
        [ 'bold', 'italic', 'underline', 'strike' ],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'script': 'super' }, { 'script': 'sub' }],
        [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
        [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
        [ 'direction', { 'align': [] }],
        [ 'link', 'image', 'video', 'formula' ],
        [ 'clean' ]                               // remove formatting button
    ];


    function imageHandler() {
            var range = this.quill.getSelection();
            var value = prompt('What is the image URL');
            if(value){
                this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
            }
        }

        Quill.register('image', imageHandler);

        const quill = new Quill('#editor', {
            theme: 'snow',
            modules:{
                toolbar: toolbarOptions,
                handlers: {
                    image: imageHandler
                }
            }
        });


    </script>
@endsection
