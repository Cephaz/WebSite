@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>identifiez-vous</h1>
    </div>
    <div class="container" id="center">
        <form action="{{ route('login') }}" method="POST" id="login">
            @csrf

            <h1>Déjà client ?</h1>

            <div class="inputlogin">

                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="email">{{ __('Email') }}</label>

                @error('email')
                <span role="alert">
                    <strong id="textered">{{ $message }}</strong>
                    <br><br>
                </span>
                @enderror
            </div>

            <div class="inputlogin">
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <label for="password">{{ __('Mot de passe') }}</label>

                @error('password')
                <span role="alert">
                    <strong id="textered">{{ $message }}</strong>
                    <br><br>
                </span>
                @enderror
            </div>

            <div class="container">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember" id="textewhite">
                    {{ __('Se souvenir de moi') }}
                </label>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Connexion') }}
            </button>

            <div class="container">
                <p>
                    @if (Route::has('password.request'))
                        <a id="clique" class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Vous avez oublié votre mot de passe ?') }}
                        </a>
                    @endif
                </p>
            </div>
        </form>
    </div>
@endsection
