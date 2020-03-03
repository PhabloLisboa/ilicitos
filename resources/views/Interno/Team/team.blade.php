@extends('template.interno.base')
@section('title', 'Equipe Ilícitos')
@section('main')
    <div class="row">
        <div class="">
            <div class="col s12 push-s3 l6 ">
                <h3 class="hedaer-page">Equipe</h3>
            </div>

            <div class="col s12 l6 pt-1 pull-s2 right-align">
                <a href="/administracao/equipe/create" class="waves-effect waves-black black btn">
                    Adicionar Integrante <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <div class="row pt-5">
        @foreach ($allByRole as $role => $users)
            <div class="row center-align">
                <div class="col s12">
                    <h6>{{$role}}</h6>
                </div>

            </div>

        @endforeach
        </div>

    </div>
@endsection
