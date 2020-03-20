@extends('template.interno.base')
@section('title', 'Peças')
@section('main')
    <div class="row">
        <div class="col s12  pull-l1 center-align l6 ">
            <h3 class="hedaer-page">Peças</h3>
        </div>

        <div class="col s12 l6 pt-1 pull-s2 right-align">
            <a href="{{route('pecas.create')}}" class="waves-effect waves-black black btn">
                Adicionar Peça <i class="fas fa-plus"></i>
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
        <div class="col s12 l10 push-l1 mt-5">
            @foreach($pieces as $piece)
                <a href="#" >
                    <div class="col s12 m3 l2 team-integrant">
                        <p class="text-overlay item-{{$piece->id}}-p">{{$piece->name}}</p>
                        <img class="responsive-img thumb" id="item-{{$piece->id}}"
                        src="{{$piece->cover ? $piece->cover : asset('/storage/images/empty.webp')}}">
                    </div>
                </a>
            @endforeach
        </div>
    </div>


    @foreach($pieces as $piece)
        <div class="overlay-team-intrgrant  item-{{$piece->id}}-modal" id="closer">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card horizontal">
                            <div class="card-image">
                            <img class="image-modal" src="{{$piece->cover ? $piece->cover : asset('/storage/images/empty.webp')}}">
                            </div>
                            <div class="card-stacked">
                            <div class="card-content">
                                <form method="POST" id="fomulario-{{$piece->id}}" action="{{route('pecas.update', $piece->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="input-field col s12">
                                        <input name="name" id="name" type="text"  value="{{$piece->name}}"class="validate">
                                        <label for="name">Nome</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                        <input name="author" id="author" type="text"  value="{{$piece->author}}"class="validate">
                                        <label for="author">Autor</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                        <input name="year" id="year" type="number" value="{{$piece->year}}"class="validate">
                                        <label for="year">Ano</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="synopsis">Sinópse</label>
                                            <textarea name="synopsis" required id="synopsis" class="materialize-textarea">{{$piece->synopsis}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="cover" id="cover" type="text" value="{{$piece->cover}}" class="validate">
                                            <label for="cover">Capa <small>(coloque algum link aqui)</small></label>

                                        </div>
                                    </div>

                                </form>
                            </div>




                            <div class="card-action">
                                <a class="waves-effect waves-light btn submit mr-1" formId="{{$piece->id}}" >Atualizar</a>

                                <form method="POST" id="deleteForm-{{$piece->id}}"  action="{{route('pecas.destroy', $piece->id)}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button  typye="submit" form="deleteForm-{{$piece->id}}"class="waves-effect waves-red red btn">
                                    Excluir <i class="fas fa-minus-circle"></i>
                                </button>


                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        let thumbs = [...document.querySelectorAll('.thumb')];

        thumbs.forEach( item =>{
            let nome = document.querySelector(`.${item.id}-p`)
            item.addEventListener('mouseover', e => {
                e.stopPropagation()
                nome.style.opacity = 1;
            })

            item.addEventListener('mouseout', e => {
                e.stopPropagation()
                nome.style.opacity = 0;
            })

            item.addEventListener('click', e => {
                document.querySelector(`.${e.target.id}-modal`).style.display = "flex"
                document.querySelector(`.${e.target.id}-modal`).style.opacity = 1


            })

            document.querySelector(`.${item.id}-modal`)
            .addEventListener('click', function(e) {

                if(e.target.classList.value === this.classList.value || e.target.classList.value === "container"){
                    this.style.opacity = 0
                    this.style.display = "none"
                }
            })
        });

        let submits = [...document.querySelectorAll('.submit')];

        submits.forEach(item => {
            item.addEventListener('click', e => {
                document.querySelector(`#fomulario-${item.getAttribute('formId')}`).submit();
            })
        })




        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
        });

    </script>

@endsection

