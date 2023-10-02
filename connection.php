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

if (isset($_POST["submit"])) {

    function cleanData($data) {
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }

    $email = cleanData($_POST["email"]);                             
    $password = cleanData($_POST["password"]);    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("L'adresse e-mail n'est pas valide.");
    }

    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $utilisateur = $stmt->fetch();

    if ($utilisateur === false || $utilisateur === null || !password_verify($password, $utilisateur['password'])) {
        $registerError['loginError'] = true;
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        die("Erreur");
    } else {
        $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
        $_SESSION['role'] = $utilisateur['role'];
        $_SESSION['email'] = $utilisateur['email'];

        header("Location: http://localhost/debutsdelafin2/account.php");
        exit();
    }
}

?>

