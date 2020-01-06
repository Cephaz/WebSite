@extends('layouts.app')

@section('content')

    <div class="container" id="center">
        <h1>Modifier un produit</h1>
    </div>
    <div class="container" id="center">
        <form action="{{action('AdminController@post_modif')}}" method="post" id="login" enctype="multipart/form-data">
            @csrf

            <div class="inputlogin">
                <input id="title" type="texte" name="title" value="{{$product->title}}" autocomplete="title" autofocus>
                <label for="title">{{ __('Titre') }}</label>
            </div>
            <div class="inputlogin">
                <input id="description" type="texte" name="description" value="{{$product->description}}" autocomplete="description" autofocus>
                <label for="description">{{ __('Description') }}</label>
            </div>
            <div class="inputlogin">
                <input id="category" type="texte" name="category" value="{{$product->category}}" autocomplete="category" autofocus>
                <label for="category">{{ __('Catégorie') }}</label>
            </div>
            <div class="inputlogin">
                <input id="price" type="number" name="price" min="0" step="any" value="{{$product->price}}" autocomplete="price" autofocus>
                <label for="price">{{ __('Prix') }}</label>
            </div>
            <div class="inputlogin">
                <input id="quantity" type="number" name="quantity" min="0" value="{{$product->quantity}}" autocomplete="quantity" autofocus>
                <label for="quantity">{{ __('Quantité') }}</label>
            </div>

            <div class="lala">
                <br>
                <input type="file" name="image" value="jajaja" autofocus>
                <label for="image">Image</label>
                {{$product->image}}
            </div>

            <div class="inputlogin">
                <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>
            </div>

            <div class="inputlogin">
                <input id="Group_id" type="hidden" name="Group_id" value="{{ Auth::user()->Group_id }}" required autocomplete="Group_id" autofocus>
            </div>
            <input type="hidden" name="id" value="{{ $product->id }}" required autocomplete="id" autofocus>

            <button type="submit">
                {{ __('Modifier') }}
            </button>
        </form>
    </div>
    <div class="container" id="espace" ></div>
@endsection
