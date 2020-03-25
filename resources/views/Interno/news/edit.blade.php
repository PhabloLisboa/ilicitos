@extends('template.interno.base')
@section('title', 'Editando Notícia')
@section('main')


    <div class="row">
        <div class="col s12 l6 offset-m2">
            <h5 class="hedaer-page">Adicionando Notícia...</h5>
        </div>
    </div>

    <div class="row">
        <form  method="POST" class="formToDispatch" enctype="multipart/form-data" action="{{route('noticias.update', $news->id)}}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="input-field col s12">
                <input name="title" required id="title" value="{{$news->title}}" type="text" class="validate">
                <label required for="title">Título *</label>
                </div>
            </div>

            <textarea name="text" >{!! $news->text !!}</textarea>
            <div class="file-field input-field">
                <div class="btn black">
                    <span>Imagem</span>
                    <input name="image" value="{{$news->image->path}}" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

    </div>

    <div class="row">
        <div class="col s12 l4 offset-l8 center-align">
            <a href="{{route('noticias.show', $news->id)}}" class="waves-effect waves-white white color-black btn">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="waves-effect submit waves-black black btn">
                Atualizar
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
