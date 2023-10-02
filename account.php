<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon compte</title>
  <script src="https://kit.fontawesome.com/93b48439f8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./styles/base.css">
  <link rel="stylesheet" href="./styles/pc.css">
  <link rel="stylesheet" href="./styles/tablettes.css" media="only screen and (min-width: 600px) and (max-width: 1080px)">
</head>

<body>
  <header class="account-header">
    <a href="index.html"><img id="logo-account" src="./images/logop.png" alt="Debuts de la fin"></a>
    <h2><img src="./images/akuma.png" alt="Votre image de profil">Goukix</h2>
    <button class="button"><a href="logout.php">> Se Déconnecter</a></button>
  </header>
	<main>
		<h1 class="title">Mon compte<span class="underline"></span></h1>
		<section class="account-flex">
			<nav>
				<ul>
            <li><i class="fa-solid fa-book fa-xl"></i><a href="#">Mes histoires</a></li>
            <li><i class="fa-solid fa-book-open fa-xl"></i><a href="addStoryForm.php">Publier une histoire</a></li>
            <li><i class="fa-solid fa-sheet-plastic fa-xl"></i><a href="#">Brouillons</a></li>
            <li><i class="fa-solid fa-star fa-xl"></i><a href="#">Mes histoires favorites</a></li>
				</ul>
			</nav>
			<nav>
				<ul>
            <li><i class="fa-solid fa-comment fa-xl"></i><a href="#">Mes commentaires</a></li>
            <li><i class="fa-solid fa-check-to-slot fa-xl"></i><a href="#">Mes votes</a></li>
            <li><i class="fa-solid fa-pen fa-xl"></i><a href="#">Modifier votre profil</a></li>
            <li><i class="fa-solid fa-trash fa-xl"></i><a href="#">Supprimer votre compte</a></li>
				</ul>
			</nav>
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

</html>