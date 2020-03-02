@extends('template.externo.base')
@section('title','Adentrando em território Ilícito')
@section('main')
    @if($person)
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <div class="row center-align">
                        <h5 class="">
                            Olá, {{$person->name}}!
                        </h5>
                        <small><i class="fas fa-exclamation-triangle red-text"></i> Cuidado! Você está adentrando em território <b>ILÍCITO</b></small>
                    </div>
                    <div class="row">
                        <div class="col s12 l6 offset-l3">
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
                        <form class="col s12 l6 offset-l3" method="POST" enctype="multipart/form-data" action="{{route('user.store')}}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="email" required id="email" type="email" class="validate">
                                    <label for="email">Email *</label>
                                </div>
                                @error('email')
                                    <small class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password" required id="password" type="password" class="validate">
                                    <label for="password">Senha *</label>
                                </div>
                                @error('password')
                                    <small class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="confirmPass" required id="confirmPass" type="password" class="validate">
                                    <label for="confirmPass">Confirme a senha *</label>
                                </div>
                                @error('confirmPass')
                                    <small class="red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="file-field input-field">
                                <div class="btn black">
                                    <span>Foto</span>
                                    <input name="avatar" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>

                            <input name="hash" hidden id="hash" type="text" value="{{$person->hash}}" class="validate">

                            <div class="row">
                                <div class="col s12 center-align">
                                    <button type="submit" class="waves-effect waves-black black btn">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row black pb-2">
                <div class="col s12 center-align">
                    <h5 class=" white-text">Link Iválido</h5>
                    <i class="fa white-text fa-exclamation-triangle fa-10x"></i>
                </div>
            </div>
        </div>
    @endif
@endsection
