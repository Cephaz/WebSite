@extends('layouts.app')

@section('content')

    <div class="container" id="espace" ></div>
    <div class="container" id="espace">

        <div class="left" >
            <form action="{{action('ProfileController@add')}}" method="post" id="login" enctype="multipart/form-data">
                @csrf

                <div class="inputlogin">
                    <input id="name" type="texte" name="name" value="{{$profile->name}}" required autocomplete="name" autofocus>
                    <label for="name">{{ __('Pseudo') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="firstname" type="texte" name="firstname" value="{{$profile->firstname}}" required autocomplete="firstname" autofocus>
                    <label for="firstname">{{ __('Prénom') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="nickname" type="texte" name="nickname" value="{{$profile->nickname}}" required autocomplete="nickname" autofocus>
                    <label for="nickname">{{ __('Nom') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="mail" type="texte" name="mail" value="{{$profile->email}}" required autocomplete="mail" autofocus>
                    <label for="mail">{{ __('Email') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="phone" type="texte" name="phone" value="{{$profile->phone}}" required autocomplete="phone" autofocus>
                    <label for="phone">{{ __('Telephone') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="date" type="date" name="date" value="{{$profile->date}}" required autocomplete="date" autofocus>
                    <label for="date">{{ __('Date de naissance') }}</label>
                </div>

                <div class="inputlogin">
                    <input id="id" type="hidden" name="id" value="{{ Auth::user()->id }}" required autocomplete="id" autofocus>
                </div>

                <button type="submit">
                    {{ __('Modifier') }}
                </button>
            </form>
        </div>

        <div class="ecar">
            <form action="{{action('ProfileController@add2')}}" method="post" id="login" enctype="multipart/form-data">
                @csrf

                <div class="inputlogin">
                    <input id="street" type="texte" name="street" value="{{$profile->street}}" required autocomplete="street" autofocus>
                    <label for="street">{{ __('Adresse') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="postal" type="texte" name="postal" value="{{$profile->postal}}" required autocomplete="postal" autofocus>
                    <label for="postal">{{ __('Code postal') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="town" type="texte" name="town" value="{{$profile->town}}" required autocomplete="town" autofocus>
                    <label for="town">{{ __('Ville') }}</label>
                </div>
                <div class="inputlogin">
                    <input id="country" type="texte" name="country" value="{{$profile->country}}" required autocomplete="country" autofocus>
                    <label for="country">{{ __('Pays') }}</label>
                </div>

                <div class="inputlogin">
                    <input id="id" type="hidden" name="id" value="{{ Auth::user()->id }}" required autocomplete="id" autofocus>
                </div>

                <button type="submit">
                    {{ __('Modifier') }}
                </button>
            </form>
        </div>
    </div>

@endsection
