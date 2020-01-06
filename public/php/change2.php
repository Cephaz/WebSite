<?php
try {
    $DB = new PDO("mysql:host=localhost;dbname=etna","root","3299");
}
catch(PDOException $e) {
    echo "Impossible de se connecter!";
}
$idtext = $_GET['texts'];
$req = $DB->query('SELECT * FROM Invoice');
$i = 0;
while($d = $req->fetch()) {
    $i++;
}
/* commande */
echo $i;
?>
