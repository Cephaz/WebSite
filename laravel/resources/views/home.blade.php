@extends('layouts.app')

@section('content')
    <?php $count = 0 ?>

    <div class="container" id="espace">
        <h1></h1>
    </div>
    @foreach($products as $product)
        @if (($count%4) == 0)
        <div class="container" id="espace">
        @endif
            <div id="bloc"><h5>{{$product->title}}</h5>
                <h5><img class="center" src="images/{{$product->image}}" alt="Produit"></h5>
                <a href="/produit/{{$product->id}}"><button class="right" id="yellow">Voir le produit</button></a>
                <a><button onclick="add_item({{ $product->id }})" type="submit" class="right" id="green">{{ __('Acheter') }}</button></a>
            </div>
                <?php $count++ ?>
            @if (($count%4) != 0)
            <div class="ecar"></div>
            @endif
        @if (($count%4) == 0)
        </div>
        @endif
    @endforeach
@endsection

