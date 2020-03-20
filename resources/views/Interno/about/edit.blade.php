@extends('template.interno.base')
@section('title', 'Alterando Sobre')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Sobre</h3>
            <small>Aqui é onde se edita o conteúdo que é apresentado em "Sobre"</small>
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

    <form action="{{route('sobre.update', $about->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="row">
            <textarea name="about" >{!!$about->about!!}</textarea>

    </div>


    <div class="row">
        <div class="col s12 l4 offset-l8 center-align">
            <a href="{{route('sobre.index')}}" class="waves-effect waves-white white color-black btn">
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
@endsection
