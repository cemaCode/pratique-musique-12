<header>
    <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    // Verifie si connecté, ca redirige à l'accueil sinon
    if (!isset($_SESSION['login'])) {
        echo "<button class='log' name='connexion'><a href='/pratique-musique-12/pages/connexion.php'>Connexion</a></button>";
    } else {
        echo "<form method='post'>
                <input id='logout' class='log'  type='submit' value='Se déconnecter' name='f_logout_button'>
              </form>";
    }
    //Deconnexion
    if (isset($_POST['f_logout_button'])) {
        session_destroy();
        header('Location: /pratique-musique-12/index.php');
    }
    ?>
    <h1><a href="/pratique-musique-12/index.php">pratique-musique-12</a></h1>
    <nav id="navbar">
        <ul>
            <li>
                <a id='accueil' href="/pratique-musique-12/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="16" height="16">
                        <path d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z"/>
                    </svg>
                    Accueil
                </a>
            </li>
            <li class="deroulant"><a class='deroulant' href="/pratique-musique-12/pages/rubriques.php">Rubriques</a>
                <ul class="sous">
                    <li class="deroulant" id="rubriques"><a
                                href="/pratique-musique-12/pages/rubriques.php">Rubriques</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/eveil_musical.php">Éveil musical</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/enseignements.php">Enseignements</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/pratique_ensemble.php">Pratiques d'ensemble</a>
                    </li>
                    <li><a href="/pratique-musique-12/pages/rubriques/accompagnement.php">Accompagnement</a></li>
                    <li><a href="/pratique-musique-12/pages/rubriques/diffusion.php">Diffusion</a></li>
                </ul>
            </li>
            <li><a href="/pratique-musique-12/pages/structures.php">Liste des structures</a></li>
            <li>
                <a id='recherche' href="/pratique-musique-12/pages/recherche.php">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 513.749 513.749" width="16"
                         height="16" fill="#440085">
                        <path d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z"/>
                    </svg>
                    Recherche
                </a>
            </li>

            <?php
            if (isset($_SESSION['login'])) {
                if (isset($_SESSION['admin'])) {
                    echo "<li><a id='menu_admin' href='/pratique-musique-12/pages/admin.php'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='16' height='16' fill='#440085'><path d='M34.283,384c17.646,30.626,56.779,41.148,87.405,23.502c0.021-0.012,0.041-0.024,0.062-0.036l9.493-5.483   c17.92,15.332,38.518,27.222,60.757,35.072V448c0,35.346,28.654,64,64,64s64-28.654,64-64v-10.944   c22.242-7.863,42.841-19.767,60.757-35.115l9.536,5.504c30.633,17.673,69.794,7.167,87.467-23.467   c17.673-30.633,7.167-69.794-23.467-87.467l0,0l-9.472-5.461c4.264-23.201,4.264-46.985,0-70.187l9.472-5.461   c30.633-17.673,41.14-56.833,23.467-87.467c-17.673-30.633-56.833-41.14-87.467-23.467l-9.493,5.483   C362.862,94.638,342.25,82.77,320,74.944V64c0-35.346-28.654-64-64-64s-64,28.654-64,64v10.944   c-22.242,7.863-42.841,19.767-60.757,35.115l-9.536-5.525C91.073,86.86,51.913,97.367,34.24,128s-7.167,69.794,23.467,87.467l0,0   l9.472,5.461c-4.264,23.201-4.264,46.985,0,70.187l-9.472,5.461C27.158,314.296,16.686,353.38,34.283,384z M256,170.667   c47.128,0,85.333,38.205,85.333,85.333S303.128,341.333,256,341.333S170.667,303.128,170.667,256S208.872,170.667,256,170.667z'/></svg>Gestion du site</a>";
                } else {
                    echo "<li><a id='menu_structure' href='/pratique-musique-12/pages/struct_admin.php'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='16' height='16' fill='#440085'><path d='M34.283,384c17.646,30.626,56.779,41.148,87.405,23.502c0.021-0.012,0.041-0.024,0.062-0.036l9.493-5.483   c17.92,15.332,38.518,27.222,60.757,35.072V448c0,35.346,28.654,64,64,64s64-28.654,64-64v-10.944   c22.242-7.863,42.841-19.767,60.757-35.115l9.536,5.504c30.633,17.673,69.794,7.167,87.467-23.467   c17.673-30.633,7.167-69.794-23.467-87.467l0,0l-9.472-5.461c4.264-23.201,4.264-46.985,0-70.187l9.472-5.461   c30.633-17.673,41.14-56.833,23.467-87.467c-17.673-30.633-56.833-41.14-87.467-23.467l-9.493,5.483   C362.862,94.638,342.25,82.77,320,74.944V64c0-35.346-28.654-64-64-64s-64,28.654-64,64v10.944   c-22.242,7.863-42.841,19.767-60.757,35.115l-9.536-5.525C91.073,86.86,51.913,97.367,34.24,128s-7.167,69.794,23.467,87.467l0,0   l9.472,5.461c-4.264,23.201-4.264,46.985,0,70.187l-9.472,5.461C27.158,314.296,16.686,353.38,34.283,384z M256,170.667   c47.128,0,85.333,38.205,85.333,85.333S303.128,341.333,256,341.333S170.667,303.128,170.667,256S208.872,170.667,256,170.667z'/></svg>Gestion structure</a>";
                }
            }
            ?>
        </ul>
    </nav>
</header>


<div class="notesQuiBougent">
    <p>
        ♩ ♪ ♫ ♬ ♪ ♪ ♬ ♫ ♫ ♬ ♩ ♩ ♪ ♬ ♩ ♪ ♫ ♬ ♪ ♪ ♬ ♫ ♫ ♬ ♩ ♩ ♪ ♬ ♬ ♪ ♪ ♬ ♬ ♪ ♪ ♬ ♬ ♪ ♪ ♩ ♪ ♫ ♬ ♪ ♪ ♬ ♫ ♫ ♬ ♩ ♩ ♪ ♬ ♬ ♪ ♪
        ♬ ♬ ♪ ♪ ♬ ♬ ♬ ♪ ♪ ♬ ♩ ♪ ♫ ♬ ♪ ♪ ♬ ♫ ♫ ♬ ♩ ♩ ♪ ♬ ♩ ♪ ♫ ♬ ♪ ♪ ♬ ♫ ♫ ♬ ♩ ♩ ♪ ♬ ♬ ♪ ♪ ♬ ♬ ♪ ♪ ♬ ♬ ♪ ♪ ♩ ♪ ♫ ♬ ♪ ♪ ♬
        ♫ ♫ ♬ ♩ ♩ ♪ ♬ ♬ ♪ ♪ ♬ ♬ ♪ ♪ ♬ ♬ ♬ ♪ ♪ ♬
    </p>
</div>



