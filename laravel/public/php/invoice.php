<?php

try {
    $DB = new PDO("mysql:host=localhost;dbname=etna","root","3299");
}
catch(PDOException $e) {
    echo "Impossible de se connecter!";
}
$idtext = $_GET['texts'];
$req = $DB->query('SELECT * FROM Product WHERE id="'.$idtext.'"');
while($d = $req->fetch()) {
    afficheligne($d, $DB);
}
function afficheligne($row, $DB)
{
    $product_id = $row['id'];
    $title = $row['title'];
    $price = $row['price'];
    $users_id = $row['users_id'];

    $req = $DB->prepare("INSERT INTO invoice (product_id, title, price, users_id) VALUES (:product_id, :title, :price, :users_id)");
    $req->bindValue(':product_id', $product_id, PDO::PARAM_INT);
    $req->bindValue(':title', $title, PDO::PARAM_STR);
    $req->bindValue(':price', $price, PDO::PARAM_INT);
    $req->bindValue(':users_id', $users_id, PDO::PARAM_INT);
    $req->execute();
}
?>
