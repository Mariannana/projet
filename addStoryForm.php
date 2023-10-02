<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/93b48439f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/tablettes.css"
        media="only screen and (min-width: 600px) and (max-width: 1080px)">
    <link rel="stylesheet" href="./styles/pc.css" media="only screen and (min-width: 1080px)">

    <title>Débuts de la fin</title>
</head>

<body>
    <header>
        <nav id="nav-header">
            <a href="http://localhost/debutsdelafin2/index.html"><img id="logo" src="./images/logo.png" alt="Debuts de la fin"></a>
            <form class="search-form">
                <input type="text" placeholder="Rechercher...">
                <i class="fas fa-search search-icon"></i>
            </form>
            <a href="http://localhost/debutsdelafin2/connectionForm.php"><img src="./images/acount.png" alt="Debuts de la fin"></a>
        </nav>
        <nav class="bottom-nav">
            <ul id="dropdown-menu">
                <li><a href="presentation.html">PRESENTATION / REGLES</a></li>
                <li><a href="sections.html">ET SI ? </a></li>
                <li><a href="sections.html">LES DEBUTS DE LA FIN</a></li>
                <li><a href="sections.html">UNE AUTRE SAISON ? </a></li>
                <li><a href="sections.html">CADAVRE EXQUIS </a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
        </nav>
        <nav class="sidenav" id="mySidenav">
            <a id="closeBtn" href="#" class="close">×</a>
            <ul>
                <li><a href="presentation.html">Présentation</a></li>
                <li><a href="sections.html">Et si ? </a></li>
                <li><a href="sections.html">Les débuts de la fin</a></li>
                <li><a href="sections.html">Une autre saison ? </a></li>
                <li><a href="sections.html">Cadavre Exquis </a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <a href="#" id="openBtn">
            <span class="burger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
    </header>
    <main>
        <section class="container-story">
            <h2 class="title">Ajoute une histoire!<span class="underline"></span></h2>
            <div class="info-story">
                <h3><i class="fa-solid fa-heart" style="color: #ededed;"></i> Les fanfictions ne doivent pas avoir de caractère
                  offensant !</h3>
                <p>Pas de langage grossier ou violent dans le titre, car ces textes peuvent être vus de tous.
                  Vous pourrez être plus explicite dans votre histoire.
                </p>
                <h3><i class="fa-solid fa-face-smile-beam" style="color: #ededed;"></i> Choisissez bien votre catégorie ! </h3>
                <p>Par exemple, dans le cas d'une "autre saison", choisissez "série" dans le formulaire</p>
                <h3><i class="fa-solid fa-pen-fancy" style="color: #ededed;"></i> Essayez de faire attention à l'orthographe </h3>
            </div>
            <div class="new-story">
                <form action="addStory.php" method="POST">
                    <label for="categorie_histoire">Catégorie d'histoire :</label>
                    <br>
                    <select name="categorie_histoire" id="categorie_histoire" required>
                        <option value="1">Et si?</option>
                        <option value="2">Les débuts de la fin</option>
                        <option value="3">Une autre saison</option>
                        <option value="4">Cadavre Exquis</option>
                    </select>
                    <br>
                    <label for="type_oeuvre" required>Type d'œuvre :</label>
                    <br>
                    <select name="type_oeuvre" id="type_oeuvre">
                        <option value="1">Livre</option>
                        <option value="2">Film</option>
                        <option value="3">BD</option>
                        <option value="4">Série</option>
                        <option value="5">Jeux vidéo</option>
                        <option value="6">Manga</option>
                    </select>
                    <br>
                    <label for="auteur">Auteur de l'œuvre d'origine :</label>
                    <br>
                    <input type="text" name="nom_auteur" id="nom_auteur" required>
                    <br>
                    <br>
                    <label for="oeuvre">Oeuvre d'origine:</label>
                    <br>
                    <input type="text" name="nom_oeuvre" id="nom_oeuvre" required>
                    <br>
                    <label for="titre">Titre de l'histoire :</label>
                    <br>
                    <input type="text" name="titre_histoire" id="titre_histoire" required>
                    <br>
                    <label for="texte">Texte de l'histoire :</label>
                    <br>
                    <textarea name="texte_histoire" id="texte_histoire" rows="10" cols="40" required></textarea>
                    <br>
                    <input class="button" type="submit" value="Ajoute ton histoire">
                </form>
            </div>
        </section>
    </main>
    <footer>
        <img src="images/logo.png" alt="logo debuts de la fin">
        <hr>
        <div class="footer">
            <a href="#"><i class="fa-brands fa-discord fa-xl" style="color: #ffffff;"></i></a>
            <a href="#"><i class="fa-brands fa-twitter fa-xl" style="color: #ffffff;"></i></a>
            <a href="#"><i class="fa-brands fa-facebook fa-xl" style="color: #ffffff;"></i></a>
            <p>©2023 <br> Les débuts de la fin </p>
            <br>

        </div>
    </footer>
</body>
<script src="./scripts/displayStory.js"></script>
</html>

