@extends('layouts.app')

@section('content')

    <div class="container" id="center">
        <h1>Ajouter un produit</h1>
    </div>
    <div class="container" id="center">
        <form action="{{action('AdminController@traitement')}}" method="post" id="login" enctype="multipart/form-data">
            @csrf

            <div class="inputlogin">
                <input id="title" type="texte" name="title" value="{{ old('title') }}" required autocomplete="title" maxlength="30" autofocus>
                <label for="title">{{ __('Titre') }}</label>
            </div>
            <div class="inputlogin">
                <input id="description" type="texte" name="description" value="{{ old('description') }}" required autocomplete="description" maxlength="255" autofocus>
                <label for="description">{{ __('Description') }}</label>
            </div>
            <div class="inputlogin">
                <input id="category" type="texte" name="category" value="{{ old('category') }}" required autocomplete="category" maxlength="30" autofocus>
                <label for="category">{{ __('Categorie') }}</label>
            </div>
            <div class="inputlogin">
                <input id="price" type="number" name="price" min="0" step="any" value="{{ old('price') }}" required autocomplete="price" autofocus>
                <label for="price">{{ __('Prix') }}</label>
            </div>
            <div class="inputlogin">
                <input id="quantity" type="number" name="quantity" min="0" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                <label for="quantity">{{ __('Quantite') }}</label>
            </div>

            <div class="lala">
                <br>
                <input type="file" name="image" required>
                <label for="image">Image</label>
            </div>

            <div class="inputlogin">
                <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" autofocus>

            </div>
            <div class="inputlogin">
                <input id="Group_id" type="hidden" name="Group_id" value="{{ Auth::user()->Group_id }}" required autocomplete="Group_id" autofocus>

            </div>

            <button type="submit">
                {{ __('Valider') }}
            </button>
        </form>
    </div>
    <div id="espace"></div>
@if( $products)
    <div class="centrer">
        <div class="container" id="login2">
            @foreach($products as $product)
                    <div class="right" >
                        <div class="right">
                            <div class="bloc2" id="center2">{{$product->title}}</div>
                        </div>
                        <div class="right">
                            <a href="/admin_modif/{{$product->id}}"><button type="submit" id="vertvif">
                                    {{ __('Modifier') }}
                                </button></a>
                            <form class="left" action="{{action('AdminController@delete')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="nbrproduct" value="{{ $product->id }}" required autocomplete="nbrproduct" autofocus>
                                <input type="hidden" name="title" value="{{ $product->title }}" required autocomplete="title" autofocus>
                                <button type="submit" id="red">
                                    {{ __('Supprimer') }}
                                </button>
                            </form>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endif
    <div id="espace"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div id="nbrutilisateur">
        <h3 id="useractifs"></h3>
        <h3 id="totocommand"></h3>
        <h3 id="plusgros"></h3>
    </div>
    <button type="button" id="refresh" onclick="infouser()">Refresh</button>

    <script type="text/javascript">
        function infouser() {
            $.ajax({
                url: 'php/change.php',
                type: 'GET',

                success: function (data) {
                    let h3 = document.getElementById("useractifs");

                    h3.innerText = "il y a "+data+" utilisateurs actifs";
                },
            });
            infocommande();
            function infocommande() {
                $.ajax({
                    url: 'php/change2.php',
                    type: 'GET',

                    success: function (data) {
                        let h4 = document.getElementById("totocommand");

                        h4.innerText = "il y a "+data+" commandes passées";
                    },
                });
                infoplusgros();
                function infoplusgros() {
                    $.ajax({
                        url: 'php/change3.php',
                        type: 'GET',

                        success: function (data) {
                            let h5 = document.getElementById("plusgros");

                            h5.innerText = "la plus grand commande est de "+data+" euros ";
                        },
                    });
                }
            }
        }
    </script>

    <div id="espace"></div>
@endsection
