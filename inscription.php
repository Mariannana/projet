<?php
session_start();
//Connexion à la BDD ---------------------//
$username = "admin";
$pass = "pass";
$bdd = null;


try {
    $bdd =  new PDO("mysql:host=localhost;dbname=fanfic", $username, $pass);
} catch (PDOException $error) {
    echo "Erreur lors de la connexion à la BDD";
}

/////////////////////////

//Création de compte
if (isset($_POST["submit"])) {

    //Test si les password correspondent-//
    if ($_POST["password"] != $_POST["confirmpassword"]) {
        $registerError["password"] = true;
    }

    //Test s'il n'y a pas d'erreurs
    if (!$registerError) {
        var_dump($registerError);
        //récupère
        $prenom = $_POST["prenom"];  
        $nom = $_POST["nom"];  
        $login = $_POST["login"];  
        $email = $_POST["email"];                             //text
        $password = $_POST["password"];                       //text
        $hash = password_hash($password, PASSWORD_DEFAULT);   //text
        
        //prepare
        $sql = "INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `login`, `email`, `password`, `role`) 
                VALUES (NULL, :prenom, :nom, :login, :email, :password, 1)";
        $stmt = $bdd->prepare($sql);
        
        //bindParam
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $hash);
        
        //execute
        $stmt->execute();
        
        //quitte et redirige vers la page "success"
        header("Location: http://..//debutsdelafin2/compte.html");
        exit;  
    }
}