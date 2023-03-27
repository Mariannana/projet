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


//////////Connexion à un compte

//Connexion à un compte ---------------- //
if (isset($_POST["submit"])) {

    //récupère du formulaire
    $login = $_POST["login"]; 
    $email = $_POST["email"];                             //text
    $password = $_POST["password"];    

    //prepare
    $sql = "SELECT * FROM utilisateurs WHERE email = :email, login= :login";
    $stmt = $bdd->prepare($sql);
    //bindParam
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    //execute
    $stmt->execute();
    //récupère de la BDD
    $utilisateur = $stmt->fetch();

    //Vérifie si l'utilisateur existe et si le mot de passe correspond
    if($utilisateur === false OR $utilisateur === null OR !password_verify($password, $utilisateur['password'])){
        //Erreur utilisateur non trouvé
        $registerError['loginError'] = true;

    } else {
        
        //stocke les données utilisateur 
        $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
        $_SESSION['login'] = $utilisateur['login'];
        $_SESSION['email'] = $utilisateur['email'];
        $_SESSION['role'] = $user['role'];

        //Quitte et redirige vers la page account.php
        header("Location: http://..//debutsdelafin2/compte.html");
        exit();
    }
}