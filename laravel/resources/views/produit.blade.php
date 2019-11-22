@extends('layouts.app')

@section('content')

    <div class="container" id="espace" >

    </div>

    <div class="container" id="produit">
        <div class="left" id="ecar">
            <img src="{{ asset('images') }}/{{ $product->image }}" alt="Produit">
        </div>

        <div class="container" id="center">
            <div class="left" id="textcenter">
                <h3>{{$product->title}}</h3>
                <h3>Categorie</h3>
                {{$product->category}}<br>
                <h3>Description</h3>
                ensemble des morceaux de texte pour réaliser un livre spécimen de polices de aaaaaaaaaassssssensemble des morceaux de texte pour réaliser un livre spécimen de polices de aaaaaaaaaassssssensemble des morceaux de texte pour réaliser un livre spécimen de polices de aaaaaaaaaassssss<br>
            </div>
        </div>

        <div class="container" id="gauche">
            <div class="milieu">
                <p>Prix: {{$product->price}} euros</p>
                <h3>Disponibilité:</h3>
                @if($product->quantity > 0)
                    <p>En stock</p>
                    <form action="{{action('ProduitController@add')}}" method="post">
                        @csrf

                        <input type="hidden" name="title" value="{{ $product->title }}" required autocomplete="title" autofocus>
                        <input type="hidden" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>
                        <input type="hidden" name="id" value="{{ $product->id }}" required autocomplete="id" autofocus>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>
                        <input type="hidden" name="Group_id" value="{{ Auth::user()->Group_id }}" required autocomplete="Group_id" autofocus>

                        <button type="submit" class="right" id="green">{{ __('Acheter') }}</button>
                    </form>
                @else
                    <p>Rupture de stock</p>
                @endif
            </div>

        </div>
    </div>


@endsection
