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
        <form  method="POST" class="formToDispatch" action="{{route('noticias.store')}}">
            @csrf


            <div class="row">
                <div class="input-field col s12">
                <input name="title" required id="title" type="text" class="validate">
                <label for="title">Título *</label>
                </div>
            </div>
            <input name="content" hidden required id="content" type="text" class="validate">

            <div id="editor">

                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>

    </div>

    <div class="row">
        <div class="col s12 l4 offset-l8 center-align">
            <a href="/administracao/noticias" class="waves-effect waves-white white color-black btn">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="waves-effect submit waves-black black btn">
                Adicionar
            </button>
        </div>
    </div>
    </form>
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

        const quill = new Quill('#editor', {
            theme: 'snow',
            modules:{
                toolbar: toolbarOptions,
            }
        });

        document.querySelector('.submit').addEventListener('click', e => {
            e.preventDefault()
            document.querySelector('#content').value = document.querySelector("#editor").innerHTML;
            document.querySelector('.formToDispatch').submit();
        })


    </script>
@endsection
