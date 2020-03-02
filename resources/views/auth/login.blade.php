@extends('template.externo.base')
@section('title', 'Login')

@section('main')
<div class="container">
    <div class="row justify-center">
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
        <form method="POST" action="{{ route('login') }}" class="card p-10">
            <h5 class="center-align">ADMINISTRAÇÃO</h5>
            @csrf

            <div class="row">
                <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email"
                        class="validate" name="email"
                        value="{{ old('email') }}"
                        required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="email">Email</label>
                </div>
                </div>
            </div>


            <div class="row">
                <div class="row">
                <div class="input-field col s12 ">
                    <input id="password" class="validate" name="password"  type="password"
                        required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <label for="password">Senha</label>
                </div>
                </div>
            </div>

            <div class="row justify-center">
                <div class="col">
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                            <span>Lembrar</span>
                        </label>
                    </p>
                </div>
            </div>

            <div class=" row justify-center">
                <div class="col">
                    <button type="submit" class="btn black">
                        Entrar
                    </button>
                </div>

                <div class="col">
                    @if (Route::has('password.request'))
                        <a class="btn black" href="{{ route('password.request') }}">
                            Esqueceu a Senha?
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

