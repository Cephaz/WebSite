@extends('layouts.app')

@section('content')

    <?php $numbreproduit = 0;
        $table = array();?>
    @foreach($basket as $Basket)
        <?php
            $table[$numbreproduit] = $Basket->title;
            $numbreproduit += 1;
        ?>

    @endforeach

        <?php
        $id = Auth::user()->id;
        $total = 0;
        $tables = array_unique($table);
        $nombre = array_count_values($table);
        $i = 0;
        ?>
    <div class="container">
        <h1>Mon panier</h1>
    </div>
    <div class="container" id="center">
        <div class="left" id="col_produit" style="background-color: red;">
            <h3>Produits</h3>
            <hr>
            @foreach($tables as $tableq)
                <div class="centrer"><p>{{$tableq}}</p></div>
            @endforeach
            <hr>
            <h3>TOTAL</h3>
        </div>
        <div class="left" id="col_prix" style="background-color: yellow;">
            <h3>Prix EUR</h3>
            <hr>
            @foreach($tables as $tableq)
                @foreach($nombre as $nombreq)
                    <?php $result = 0;?>
                    @foreach($basket as $Basket)
                        <?php if ($tableq == $Basket->title) {
                            $result += $Basket->price;} ?>
                    @endforeach
                @endforeach
                    <div class="centrer">
                        <p>{{$result}}</p>
                    </div>
                    <?php $total += $result; ?>
            @endforeach
            <hr>
            <h3>{{$total}}</h3>
        </div>
        <div class="left" id="col_quantity" style="background-color: cyan;">
            <h3>Quantite</h3>
            <hr>
            <?php $count = 0?>
            @foreach($nombre as $nombreq)
                <div class="centrer">
                    <p>{{$nombreq}}</p>
                    <form action="{{action('PanierController@delete')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="title" value="{{$table[$count]}}" required autocomplete="title" autofocus>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>
                            <input action="{{action('PanierController@delete')}}" type="image" src="{{ asset('img/poubelle.png') }}" width="25">
                    </form>
                </div>
                <?php $count++ ?>
            @endforeach
            <hr>
            <h3>{{ array_sum($nombre)}}</h3>
        </div>
    </div>
    <div id="espace"></div>
    <div class="centrer">
        <a href="/paiement/{{$id}}"><button type="submit" id="vertvif">{{ __('Passer au paiement') }}</button></a>
    </div>
    <div id="espace"></div>
@endsection
