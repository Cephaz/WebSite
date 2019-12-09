<?php
try {
    $DB = new PDO("mysql:host=localhost;dbname=etna","root","3299");
}
catch(PDOException $e) {
    echo "Impossible de se connecter!";
}
$req = $DB->query('SELECT * FROM users ');
$i = 0;
while($d = $req->fetch()) {
    /* utilisateurs actifs*/
    $i++;
}
echo $i;

?>
