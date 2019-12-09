
function call_alert() {
    var addbalise = document.createElement("P");
    var myValue = document.getElementById('text').value;
    var myValuee = document.getElementById('iciproduit');

    if (myValue == "" || myValue === null)
        alert("ERROR - value vide");
    else {
        let url = '../'+'php/'+'fetch.php?texts='+ myValue;

        var request = new Request(url, {
            method: 'GET',
            texts: myValue,
        });

        fetch(request)
            .then(res =>  res.text())
            .then(data => { addbalise.innerText = data })

        myValuee.appendChild(addbalise);
        document.getElementById('text').value = "";
    }
}
