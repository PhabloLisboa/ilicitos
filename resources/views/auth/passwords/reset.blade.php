@extends('template.externo.base')
@section('title', 'Alterando  senha')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Alterar Senha</span>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">



                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">Email</label>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password">Senha</label>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">Confirme a Senha</label>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row center center-align">
                            <button type="submit" class="btn black btn-primary">
                                {{ __('Alterar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
