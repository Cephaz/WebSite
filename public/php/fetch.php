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
    afficheligne($d);
}
function afficheligne($row) {
    echo  $row['title'];
}
?>
