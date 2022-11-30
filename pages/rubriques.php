<!DOCTYPE html>
<html lang="fr">

<head>
    <title>pratique-musique-12</title>
    <link rel="icon" type="image/x-icon" href="/pratique-musique-12/icons/icone.ico">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/pratique-musique-12/stylesheet/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/pratique-musique-12/stylesheet/rubriques.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/pratique-musique-12/stylesheet/print.css" media="print"/>
</head>

<body>
<?php
require_once('header.php');
?>

<h2>Rubriques</h2>
<section>
    <div class="fig_container">
        <figure class="fig_description">
            <a href="/pratique-musique-12/pages/rubriques/eveil_musical.php"><img
                        src="/pratique-musique-12/images/eveil_musical.jpg"/>
                <figcaption class="titre_img">Éveil musical</figcaption>
            </a>

            <figcaption class="description">Structures proposant de l'éveil musical</figcaption>
        </figure>
    </div>

    <div class="fig_container">
        <figure class="fig_description">
            <a href="/pratique-musique-12/pages/rubriques/enseignements.php"><img
                        src="/pratique-musique-12/images/enseignements.jpg"/>
            <figcaption class="titre_img">Enseignements</figcaption></a>
            <figcaption class="description">Structures proposant les enseignements classés par instruments</figcaption>
        </figure>
    </div>

    <div class="fig_container">
        <figure class="fig_description">
            <a href="/pratique-musique-12/pages/rubriques/pratique_ensemble.php"><img
                        src="/pratique-musique-12/images/pratique_ensemble.jpg"/>
            <figcaption class="titre_img">Pratiques d'ensemble</figcaption></a>
            <figcaption class="description">Structures proposant de la pratique d'ensemble</figcaption>
        </figure>
    </div>

    <div class="fig_container">
        <figure class="fig_description">
            <a href="/pratique-musique-12/pages/rubriques/accompagnement.php"><img
                        src="/pratique-musique-12/images/accompagnement.jpg"/>
            <figcaption class="titre_img">Accompagnement</figcaption></a>
            <figcaption class="description">Structures proposant de l'accompagnement</figcaption>
        </figure>
    </div>

    <div class="fig_container">
        <figure class="fig_description">
            <a href="/pratique-musique-12/pages/rubriques/diffusion.php"><img
                        src="/pratique-musique-12/images/diffusion.jpg"/>
            <figcaption class="titre_img">Diffusion</figcaption></a>
            <figcaption class="description">Liste des structures proposant de la diffusion</figcaption>
        </figure>
    </div>

</section>

<?php
require_once('footer.php');
?>
</body>
</html>