<?php

$username = "admin";
$pass = "pass";
$bdd = null;

try {
    $bdd =  new PDO("mysql:host=localhost;dbname=fanfic", $username, $pass);
} catch (PDOException $error) {
    echo "Erreur lors de la connexion à la BDD";
}

////////////////////////////////////////

if (isset($_POST["submit"])) {
  
    function cleanData($data) {
        return htmlentities(strip_tags(stripslashes(trim($data))));
    }

    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    $registerError = array();

    if ($_POST["password"] != $_POST["confirmpassword"]) {
        $registerError["password"] = true;
    }

    if (empty($registerError)) {
        $prenom = cleanData($_POST["prenom"]);  
        $nom = cleanData($_POST["nom"]);  
        $login = cleanData($_POST["login"]);  
        $email = cleanData($_POST["email"]);

        if (!validateEmail($email)) {
            die("L'adresse e-mail n'est pas valide.");
        }

        $password = cleanData($_POST["password"]);                       
        $hash = password_hash($password, PASSWORD_DEFAULT);   

        $sql = "INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `login`, `email`, `password`, `role`) 
                VALUES (NULL, :prenom, :nom, :login, :email, :password, 1)";
        $stmt = $bdd->prepare($sql);

        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $hash);
        $stmt->execute();

        header("Location: http://localhost/debutsdelafin2/account.html"); 
    }
}



?>