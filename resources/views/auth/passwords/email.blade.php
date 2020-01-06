@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Oublie du mot de passe</h1>
</div>

<div class="container" id="center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST" id="login">
        @csrf

        <h1>Votre Email</h1>
        <div class="inputlogin">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="email" >{{ __('Email') }}</label>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong id="textered">{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <button type="submit" >
            {{ __('Envoyer') }}
        </button>

        <div class="container">
            <p><a id="clique" href="{{ route('login') }}">Vous pouvez vous connecter ici .</a></p>
        </div>
    </form>
</div>
@endsection
