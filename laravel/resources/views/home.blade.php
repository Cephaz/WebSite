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
                <a class="rightligne" href="/produit/{{$product->id}}"><button id="yellow">Voir le produit</button></a>
                    <form action="{{action('ProduitController@add')}}" class="rightligne" method="post">
                        @csrf

                        <input type="hidden" name="title" value="{{ $product->title }}" required autocomplete="title" autofocus>
                        <input type="hidden" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>
                        <input type="hidden" name="id" value="{{ $product->id }}" required autocomplete="id" autofocus>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>
                        <input type="hidden" name="Group_id" value="{{ Auth::user()->Group_id }}" required autocomplete="Group_id" autofocus>

                        <a><button type="submit" id="green">{{ __('Achat Direct') }}</button></a>
                    </form>
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

