@extends('template.interno.base')
@section('title', 'Equipe Ilícitos')
@section('main')
    <div class="row">
        <div class="">
            <div class="col s12  pull-l1 center-align l6 ">
                <h3 class="hedaer-page">Equipe</h3>
            </div>

            <div class="col s12 l6 pt-1 pull-s2 right-align">
                <a href="/administracao/equipe/create" class="waves-effect waves-black black btn">
                    Adicionar Integrante <i class="fas fa-plus"></i>
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

        <div class="row">
            <div class="col s12 l10 push-l1 mt-5">
                @foreach ($allByRole as $role => $users)
                    <div class="row">
                        <div class="col s12 l4 pull-l1 center-align">
                            <h6>{{$role}}</h6>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($users as $user)
                            <a href="#" >
                                <div class="col s12 m3 l2 team-integrant">
                                    <p class="text-overlay item-{{$user->id}}-p">{{$user->name}}</p>
                                    <img class="responsive-img thumb" id="item-{{$user->id}}"
                                    src="{{$user->user->avatar ? asset('/storage/images').'/'. $user->user->avatar->path : asset('/storage/images/empty.webp')}}">
                                </div>
                            </a>
                        @endforeach
                    </div>

                @endforeach
            </div>
        </div>

    </div>

    @foreach ($allByRole as $role => $users)
        @foreach($users as $user)
            <div class="overlay-team-intrgrant  item-{{$user->id}}-modal" id="closer">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card horizontal">
                                <div class="card-image">
                                <img class="image-modal" src="{{$user->user->avatar ? asset('/storage/images').'/'. $user->user->avatar->path : asset('/storage/images/empty.webp')}}">
                                </div>
                                <div class="card-stacked">
                                <div class="card-content">
                                    <form method="POST" id="fomulario-{{$user->id}}" action="{{route('equipe.update', $user->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input name="name" id="name" type="text"  value="{{$user->name}}"class="validate">
                                            <label for="name">Nome</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input name="email" id="email" type="text"  value="{{$user->user->email}}"class="validate">
                                            <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input name="description" id="description" type="text" disabled={{($user->user->description)? false: true}} value="{{$user->user->description}}"class="validate">
                                            <label for="description">Descrição</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="role_id">
                                                    @foreach($roles as $role)
                                                        <option selected={{$user->role_id === $role->id? true: false }} value="{{$role->id}}">{{$role->description}}</option>
                                                    @endforeach
                                                </select>
                                                <label>Função</label>
                                            </div>
                                        </div>
                                        <p>
                                            <label>
                                              <input name="isRedator" type="checkbox" {{$user->user->sys_role_id != 3 ? "checked" : ""}}/>
                                              <span>Também é um Redator</span>
                                            </label>
                                          </p>

                                    </form>
                                </div>
                                <div class="card-action">
                                    <a class="waves-effect waves-light btn submit" formId="{{$user->id}}" >Atualizar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
