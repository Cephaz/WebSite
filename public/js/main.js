//cookie !!

var check_cookie = accessCookie("autorisation_cookie");
if (!check_cookie) {
    if (confirm("le site utilise des cookies ! ok pour accepter, annuler pour refuser")) {
        createCookie("autorisation_cookie", "true", 100);
    }
}

function createCookie(cookieName,cookieValue,daysToExpire)
{
    var date = new Date();
    date.setTime(date.getTime()+(daysToExpire*24*60*60*1000));
    document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
}

function accessCookie(cookieName)
{
    var name = cookieName + "=";
    var allCookieArray = document.cookie.split(';');
    for(var i=0; i<allCookieArray.length; i++)
    {
        var temp = allCookieArray[i].trim();
        if (temp.indexOf(name)===0)
            return temp.substring(name.length,temp.length);
    }
    return "";
}

function add_item(id_produit) {
    if (!localStorage.basket) {
        var add = [];
        add.push(id_produit);
        localStorage.setItem("basket", JSON.stringify(add));
    }
    else {
        var add = JSON.parse(localStorage.getItem("basket"));
        add.push(id_produit);
        localStorage.setItem("basket", JSON.stringify(add));
    }
    document.location.href="/panier";
}

function call_title(id) {

    var myValue = id;

    if (myValue === "" || myValue === null)
        alert("ERROR - value vide");
    else {
        let url = '../' + 'php/' + 'fetch.php?texts=' + myValue;

        var request = new Request(url, {
            method: 'GET',
            texts: myValue,
        });

        fetch(request)
            .then(res => res.text())
            .then(data => {
                var parent = document.getElementById("124578");
                var div = document.createElement("div");
                var p = document.createElement("p");

                p.setAttribute("style","padding:12.7px 1px;");
                p.innerText = data;
                div.appendChild(p);
                parent.appendChild(div);
            })
    }
}
function call_price(id, nb) {

    var myValue = id;

    if (myValue === "" || myValue === null)
        alert("ERROR - value vide");
    else {
        let url = '../' + 'php/' + 'price.php?texts=' + myValue;

        var request = new Request(url, {
            method: 'GET',
            texts: myValue,
        });

        fetch(request)
            .then(res => res.text())
            .then(data => {
                var parent = document.getElementById("235689");
                var div = document.createElement("div");
                var p = document.createElement("p");

                var integer = parseInt(data, 10);
                var num = integer * nb;

                p.setAttribute("style","padding:12.7px 1px;");
                p.innerText = num.toString();
                div.appendChild(p);
                parent.appendChild(div);



                var totaux = parseInt(localStorage.getItem("totaux"), 10) + num;

                localStorage.setItem("totaux", totaux.toString());
            })

    }
}

function nbrproduit() {
    var array = JSON.parse(localStorage.getItem("basket"));
    var array_id = [];
    var array_count = [];

    for (var i = 0 ; i < array.length ; i++) {
        var count = 1;
        for (var j = i + 1 ; j < array.length ; j++) {
            while (array[j] === array[i]) {
                array.splice(j, 1);
                count++;
            }
        }
        array_id.push(array[i]);
        array_count.push(count);
    }

    var parent = document.getElementById("123456");
    var h3 = document.createElement("h3");
    var total = 0;
    for (var i = 0 ; i < array_count.length ; i++) {
        total += array_count[i];
    }
    h3.innerText = total;
    parent.appendChild(h3);
}

function del_item(id) {
    let arr = JSON.parse(localStorage.getItem("basket"));
    let nb = 0;
    for (let i = 0 ; i < arr.length ; i++) {

        if (arr[i] === id && nb === 0) {
            arr.splice(i, 1);
            nb = 1;
        }
    }
    localStorage.removeItem("basket");
    localStorage.setItem("basket",JSON.stringify(arr));
    document.location.href="/panier";
}

function add_invoice() {

    var tab = JSON.parse(localStorage.getItem("basket"));
    for (var i = 0 ; i < tab.length ; i++) {
        var myValue = tab[i];

        if (myValue === "" || myValue === null)
            alert("ERROR - value vide");
        else {
            let url = '../' + 'php/' + 'invoice.php?texts=' + myValue;

            var request = new Request(url, {
                method: 'GET',
                texts: myValue,
            });

            fetch(request)
                .then(res => res.text())
        }
    }
    localStorage.clear();
}

