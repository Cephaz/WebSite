@extends('layouts.app')

@section('content')

    <script>
        var array = JSON.parse(localStorage.getItem("basket"));
        var array_id = [];
        var array_count = [];


        for (var i = 0 ; i < array.length ; i++) {
            var count = 1;
            for (var j = i + 1 ; j < array.length ; j++) {
                while (array[j] == array[i]) {
                    array.splice(j, 1);
                    count++;
                }
            }
            array_id.push(array[i]);
            array_count.push(count);
        }
    </script>

    <div class="container">
        <h1>Mon panier</h1>
    </div>
    <div class="container" id="center">
        <div class="left" id="col_produit" style="background-color: red;">
            <h3>Produits</h3>
            <div id="124578"></div>

            <script>
                for (var i = 0 ; i < array_id.length ; i++) {
                    call_title(array_id[i]);

                }
            </script>

            <hr>
            <h3>TOTAL</h3>
        </div>
        <div class="left" id="col_prix" style="background-color: yellow;">
            <h3>Prix EUR</h3>
            <div id="235689"></div>

            <script>

                for (var i = 0 ; i < array_id.length ; i++) {
                    call_price(array_id[i], array_count[i]);

                }
            </script>

            <hr>
            <div id="597531"></div>
            <script>
                var parent = document.getElementById("597531");
                var h3 = document.createElement("h3");


                h3.innerText = localStorage.getItem("totaux");
                parent.appendChild(h3);

                localStorage.setItem("totaux", "0");

            </script>
        </div>
        <div class="left" id="col_quantity" style="background-color: cyan;">
            <h3>Quantite</h3>
            <div id="134679"> </div>

            <script>
                var parent = document.getElementById("134679");
                var k = 0;
                for (var i = 0 ; i < array_count.length ; i++) {
                    var div = document.createElement("div");
                    var p = document.createElement("p");
                    var input = document.createElement("input");
                    p.innerText = array_count[i];
                    p.setAttribute("style","padding:10px 10px;");
                    input.setAttribute("id" , "895623");
                    input.setAttribute("type" , "image");
                    input.setAttribute("style","margin:0px; width:20px;");
                    input.setAttribute("src" , "{{ asset('img/poubelle.png') }}");
                    div.appendChild(p);
                    p.appendChild(input);
                    div.setAttribute("class", "center");
                    parent.appendChild(div);
                    input.setAttribute("onclick","del_item("+array_id[k]+")");
                    k++;
                }
            </script>
            <hr>
            <div id="784512"> </div>
            <script>
                var parent = document.getElementById("784512");
                var h3 = document.createElement("h3");
                var total = 0;
                for (var i = 0 ; i < array_count.length ; i++) {
                    total += array_count[i];
                }
                h3.innerText = total;
                parent.appendChild(h3);


            </script>

        </div>
    </div>
    <div id="espace"></div>
    <div class="centrer">
        <a href="/paiement/id"><button type="submit" id="vertvif" onclick="add_invoice()">{{ __('Passer au paiement') }}</button></a>
    </div>
    <div id="espace"></div>
@endsection
