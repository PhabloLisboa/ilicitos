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
                <label required for="title">Título *</label>
                </div>
            </div>

            <textarea name="text" ></textarea>

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
    <script src="https://cdn.tiny.cloud/1/cy38zql363bzwrybyrr5d0iwpzh12myl6sg8fpwt1skimwiv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
          toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
          toolbar_mode: 'floating',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
          language: 'pt_BR'
        });
      </script>
    <script>
    </script>
@endsection
