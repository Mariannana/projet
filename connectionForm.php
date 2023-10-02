<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/tablettes.css" media="only screen and (min-width: 600px) and (max-width: 1080px)">
    <link rel="stylesheet" href="./styles/pc.css" media="only screen and (min-width: 1080px)">

    <title>Débuts de la fin</title>
</head>

<body>
    <main class="connexion">
        <section class="grid-co">
            <nav id="mainco">
               <img src="./images/logo.png">
            </nav>
            <article>
                <form class="form formConnexion" method="POST" action="connection.php">
                    <fieldset class="field-co">
                        <legend>Se connecter</legend>
                        <label for="email">Email : </label>
                        <br>
                        <input type="email" id="email" name="email" placeholder="Veuillez saisir votre email"
                            minlength="2" maxlength="50" size="20">
                        <br>
                        <label for="password"> Mot de passe: </label>
                        <br>
                        <input type="password" id="password" name="password" minlength="5" maxlength="20" size="20"
                            placeholder="Veuillez saisir votre mot de passe">
                        <br>
                        <input class="button" type="submit" name="submit" value="Se connecter" />
                        <br>
                        <label for="password">Pas encore de compte?</label>
                        <br>
                        <a href="createAccount.html" class="button">S'inscrire</a>
                    </fieldset>
                </form>
            </article>
            <aside>
                <img id=chat src="./images/catco.png">
            </aside>
        </section>
    </main>   
</body>
<script src="./scripts/scriptLog.js"></script> 
</html>