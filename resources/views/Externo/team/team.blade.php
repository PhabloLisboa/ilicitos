@extends('template.externo.base')
@section('title', 'Equipe')
@section('main')
<div class="container">
    <div class="row">
        <div class="col">
            @foreach ($allByRole as $role => $users)
                <div class="row">
                    <div class="col">
                        <h6>{{$role}}</h6>
                    </div>
                </div>
                <div class="row">
                    @foreach($users as $user)
                        <div class="col s6 l3 mr-1">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{($user->user && $user->user->avatar)? asset('/storage/images').'/'. $user->user->avatar->path : asset('/storage/images/empty.webp')}}">
                                    <span class="card-title">{{$user->name}}</span>
                                </div>

                                <div class="card-content">
                                    <p class="text-card">{{$user->description}}</p>
                                </div>
                                <div class="card-action">
                                    <a href="{{route('show.member', $user->user->id)}}">Saber Mais</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
