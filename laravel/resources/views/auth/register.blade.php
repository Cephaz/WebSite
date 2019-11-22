@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Création de compte</h1>
</div>

<div class="container" id="center">
    <form method="POST" action="{{ route('register') }}" id="login">
        @csrf
        <h1>Vos identifiants</h1>

        <div class="inputlogin">
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <label for="name">{{ __('Nom') }}</label>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong id="textewhite">{{ $message }}</strong>
            </span>
            <br><br>
            @enderror

        </div>

        <div class="inputlogin">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            <label for="email">{{ __('Email') }}</label>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong id="textered">{{ $message }}</strong>
            </span>
            <br><br>
            @enderror

        </div>

        <div class="inputlogin">
            <input id="password" type="password" name="password" required autocomplete="new-password">
            <label for="password">{{ __('Mot de passe') }}</label>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong id="textered">{{ $message }}</strong>
            </span>
            <br><br>
            @enderror

        </div>

        <div class="inputlogin">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <label for="password-confirm">{{ __('Confirmation du mot de passe') }}</label>
        </div>

        <button type="submit">
                    {{ __('Enregistrer') }}
        </button>

        <div class="container">
            <p><a id="clique" href="{{ route('login') }}">Vous pouvez vous connecter ici .</a></p>
        </div>
    </form>
</div>
@endsection
