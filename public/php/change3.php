<?php
try {
    $DB = new PDO("mysql:host=localhost;dbname=etna","root","3299");
}
catch(PDOException $e) {
    echo "Impossible de se connecter!";
}
$req = $DB->query('SELECT price FROM Invoice');
$i = 0;
while($d = $req->fetch()) {
    if ($i < affichecher($d)) {
        $i = affichecher($d);
    }
}
echo $i;
function affichecher($row) {
    return $row['price'];
}
?>
