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

if (isset($_POST["registerSubmit"])) {

    //Test si les password correspondent-//
    if ($_POST["password"] != $_POST["passwordConfirm"]) {
        $registerError["password"] = true;
    }

    //Test s'il n'y a pas d'erreurs
    if (!$registerError) {
        
        //récupère
        $prenom = $_POST["prenom"];  
        $nom = $_POST["nom"];  
        $login = $_POST["login"];  
        $mail = $_POST["mail"];                             //text
        $password = $_POST["password"];                       //text
        $hash = password_hash($password, PASSWORD_DEFAULT);   //text
        //prepare
        $sql = "INSERT INTO `utilisateurs` (`id`, `prenom`,  `nom`, `login`, `mail`,`password`, `role`) VALUES (NULL,`:prenom`, `:nom`, `:login`, `:mail`,`:password`, 1);
        $stmt = $bdd->prepare($sql);
        //bindParam
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":mail", $mail);
        $stmt->bindParam(":password", $hash);
        //execute
        $stmt->execute();
        //quitte et redirige vers la page "success
        header("Location: compte.html"); 
        exit;  
    }
}

//////////Connexion à un compte

//Connexion à un compte ---------------- //
if (isset($_POST["logInSubmit"])) {

    //récupère du formulaire
    $mail = $_POST["mail"];                             //text
    $password = $_POST["password"];    

    //prepare
    $sql = "SELECT * FROM users WHERE mail = :mail";
    $stmt = $bdd->prepare($sql);
    //bindParam
    $stmt->bindParam(':mail', $mail);
    //execute
    $stmt->execute();
    //récupère de la BDD
    $utilisateur = $stmt->fetch();

    //Vérifie si l'utilisateur existe et si le mot de passe correspond
    if($utilisateur === false OR $utilisateur === null OR !password_verify($password, $user['password'])){
        //Erreur utilisateur non trouvé
        $registerError['loginError'] = true;

    } else {
        
        //stocke les données utilisateur 
        $_SESSION['id_utilisateur'] = $utilisateur['id'];
        $_SESSION['role'] = $utilisateur['role'];
        $_SESSION['email'] = $utilisateur['mail'];

        //Quitte et redirige vers la page account.php
        header('Location: connexion.html');
        exit;
    }
}