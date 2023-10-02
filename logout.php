<?php
$username = "admin";
$pass = "pass";
$bdd = null;


try {
    $bdd =  new PDO("mysql:host=localhost;dbname=fanfic", $username, $pass);
} catch (PDOException $error) {
    echo "Erreur lors de la connexion à la BDD";
}

/////////////////////////

session_start();

$_SESSION = array();

session_destroy();

header("Location: http://localhost/debutsdelafin2/connectionForm.php");
exit();

?>