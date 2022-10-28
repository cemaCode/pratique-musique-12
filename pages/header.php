<header>
    <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    // Verifie si connecté, ca redirige à l'accueil sinon
    if (!isset($_SESSION['login'])) {
        echo "<button name='connexion'><a href='/pratique-musique-12/pages/connexion.php'>Connexion</a></button>";
    } else {
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
            <li><a id='accueil' href="/pratique-musique-12/index.php">Accueil</a></li>
            <li class="deroulant"><a class='deroulant' href="/pratique-musique-12/pages/rubriques.php">Rubriques</a>
                <ul class="sous">
                    <li class="deroulant" id="rubriques"><a
                                href="/pratique-musique-12/pages/rubriques.php">Rubriques</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/eveil_musical.php">Eveil musical</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/enseignements.php">Enseignements</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/pratique_ensemble.php">Pratiques d'ensemble</a>
                    </li>
                    <li><a href="/pratique-musique-12/pages/rubriques/accompagnement.php">Accompagnement</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/diffusion.php">Diffusion</a></li>
                </ul>
            </li>
            <li><a href="/pratique-musique-12/pages/structures.php">Structures</a></li>
            <li><a id='recherche' href="/pratique-musique-12/pages/recherche.php">Recherche</a></li>

            <?php
            if (isset($_SESSION['login'])) {
                if (isset($_SESSION['admin'])) {
                    echo "<li><a id='menu_admin' href='/pratique-musique-12/pages/admin.php'>Gestion du site</a>";
                } else {
                    echo "<li><a id='menu_structure' href='/pratique-musique-12/pages/struct_admin.php'>Gestion structure</a>";
                }
            }
            ?>
        </ul>
    </nav>
</header>



