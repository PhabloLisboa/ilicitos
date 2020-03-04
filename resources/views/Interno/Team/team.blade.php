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
        </div>

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
@endsection
@section('script')
    <script>
        let thumbs = [...document.querySelectorAll('.thumb')];

        thumbs.forEach( item =>{
            item.addEventListener('mouseover', e => {
                e.stopPropagation()
                document.querySelector(`.${e.target.id}-p`).style.opacity = 1;
            })

            item.addEventListener('mouseout', e => {
                e.stopPropagation()
                document.querySelector(`.${e.target.id}-p`).style.opacity = 0;
            })
        })


    </script>

@endsection
