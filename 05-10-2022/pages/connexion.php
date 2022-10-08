<!DOCTYPE html>
<html lang="fr">

<head>
    <title>pratique-musique-12</title>
    <link rel="shortcut icon" href="#.ico"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/stylesheet/connexion.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/stylesheet/header.css" media="screen"/>
</head>

<header>
    <h1><a href="/pratique-musique-12/index.php">pratique-musique-12</a></h1>
</header>

<body>
<h2>Connexion</h2>

<article>
<form action="Connexion.php" method="post">

    <label for="login">Nom d'utilisateur : </label>
    <input type="text" name="fLogin" id="login"></br>
    <label for="password">Mot de passe : </label>
    <input type="password" name="fPassword" id="password"></br>
    <input class="connect" type="submit" value="Se connecter"/>

</form>
</article>

<?php
include('footer.php');
?>
</body>
</html>