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
                {{$product->description}}<br>
            </div>
        </div>

        <div class="container" id="gauche">
            <div class="milieu">
                <p>Prix: {{$product->price}} euros</p>
                <h3>Disponibilité:</h3>
                @if($product->quantity > 0)
                    <p>En stock</p>
                    <button onclick="add_item({{ $product->id }})" type="submit" class="right" id="green">{{ __('Acheter') }}</button>
                @else
                    <p>Rupture de stock</p>
                @endif
            </div>

        </div>
    </div>


@endsection
