<header>
    <?php
    //require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
        session_start();
        // Verifie si connecté, ca redirige à l'accueil sinon
        if (!isset($_SESSION['login'])) {
            echo "<button name='connexion'><a href='/pratique-musique-12/pages/connexion.php'>Connexion</a></button>";
        }
        else{
            echo "<form method='post'>
                <input id='logout' type='submit' value='Se déconnecter' name='f_logout_button'>
              </form>";
        }
    //Deconnexion
        if (isset($_POST['f_logout_button'])) {
            session_destroy();
            header('Location: /pratique-musique-12/index.php');
        }
    ?>
    <h1><a href="/pratique-musique-12/index.php">pratique-musique-12</a></h1>
    <nav>
        <ul>
            <li><a href="/pratique-musique-12/index.php">Accueil</a></li>
            <li class="deroulant"><a href="/pratique-musique-12/pages/rubriques.php">Rubriques</a>
                <ul class="sous">
                    <li><a href="/pratique-musique-12/pages/rubriques.php">Rubriques</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/eveil_musical.php">Eveil musical</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/enseignements.php">Enseignements</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/pratique_ensemble.php">Pratiques d'ensemble</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/accompagnement.php">Accompagnement</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/diffusion.php">Diffusion</a></li>
                </ul>
            </li>
            <li><a href="/pratique-musique-12/pages/recherche.php">Recherche</a></li>
            <li><a href="/pratique-musique-12/pages/contact.php">Contact</a>
        </ul>
    </nav>
</header>



