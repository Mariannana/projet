<?php
session_start();

// Connexion à la BDD
$username = "admin";
$pass = "pass";

try {
    $bdd = new PDO("mysql:host=localhost;dbname=fanfic", $username, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

function cleanData($data) {
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

// Récupération des données du formulaire et nettoyage
$categorie_histoire = cleanData($_POST['categorie_histoire']);
$type_oeuvre = cleanData($_POST['type_oeuvre']);
$nom_auteur = html_entity_decode(cleanData($_POST['nom_auteur']));
$nom_oeuvre = html_entity_decode(cleanData($_POST['nom_oeuvre']));
$titre_histoire = html_entity_decode(cleanData($_POST['titre_histoire'])); 
$texte_histoire = html_entity_decode(cleanData($_POST['texte_histoire']));
 

if (empty($categorie_histoire) || empty($type_oeuvre) || empty($nom_auteur)
 || empty($nom_oeuvre) || empty($titre_histoire) || empty($texte_histoire)) {
    echo "Veuillez remplir tous les champs obligatoires.";
    exit;
}

try {
    $stmt = $bdd->prepare("INSERT INTO histoire (titre_histoire, date_creation, categorie_histoire) 
                           VALUES (:titre_histoire, NOW(), :categorie_histoire)");
    $stmt->bindParam(':titre_histoire', $titre_histoire);
    $stmt->bindParam(':categorie_histoire', $categorie_histoire);
    $stmt->execute();
    $id_histoire = $bdd->lastInsertId();

    $stmt = $bdd->prepare("INSERT INTO auteur (nom_auteur) VALUES (:nom_auteur)");
    $stmt->bindParam(':nom_auteur', $nom_auteur);
    $stmt->execute();
    $id_auteur = $bdd->lastInsertId();

    $stmt = $bdd->prepare("INSERT INTO oeuvre (nom_oeuvre, id_type_oeuvre) VALUES (:nom_oeuvre, :type_oeuvre)");
    $stmt->bindParam(':nom_oeuvre', $nom_oeuvre);
    $stmt->bindParam(':type_oeuvre', $type_oeuvre);
    $stmt->execute();
    $id_oeuvre = $bdd->lastInsertId();

    // Association de l'auteur et de l'oeuvre dans la table "inventer"
    $stmt = $bdd->prepare("INSERT INTO inventer (id_auteur, id_oeuvre) VALUES (:id_auteur, :id_oeuvre)");
    $stmt->bindParam(':id_auteur', $id_auteur);
    $stmt->bindParam(':id_oeuvre', $id_oeuvre);
    $stmt->execute();

    // Association de l'histoire et de l'oeuvre dans la table "suivre"
    $stmt = $bdd->prepare("INSERT INTO suivre (id_histoire, id_oeuvre) VALUES (:id_histoire, :id_oeuvre)");
    $stmt->bindParam(':id_histoire', $id_histoire);
    $stmt->bindParam(':id_oeuvre', $id_oeuvre);
    $stmt->execute();

    // Récupération de l'id_utilisateur correspondant à l'email de la session
    $stmt = $bdd->prepare("SELECT id_utilisateur FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id_utilisateur = $result['id_utilisateur'];
    } else {
        exit("Erreur : utilisateur introuvable.");
    }

    $stmt = $bdd->prepare("INSERT INTO texte_histoire (contenu_histoire, date_ecriture, id_histoire, id_utilisateur) 
                           VALUES (:contenu_histoire, NOW(), :id_histoire, :id_utilisateur)");
    $stmt->bindParam(':contenu_histoire', $texte_histoire);
    $stmt->bindParam(':id_histoire', $id_histoire);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur);
    $stmt->execute();

    header("Location: http://localhost/debutsdelafin2/success.html");
    exit;
} catch(PDOException $e) {
    echo "Erreur lors de l'insertion des données : " . $e->getMessage();
}

$bdd = null;
?>





    







        
