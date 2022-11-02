<?php
include('head.php')
?>

<body>
    <?php
    include('header.php');
    ?>

    <h2>Recherche</h2>
    <section>
        <!-- Formulaire de recherche  -->
        <form id="f_recherche" role="search">
            <!-- Liste déroulante RUBRIQUES -->
            <label for="f_rubrique">Selectionner une rubrique:</label>
            <select name="f_rubrique" id="rubrique_offre">
                <option value="Accompagnement">Accompagnement </option>
                <option value="Diffusion">Diffusion</option>
                <option value="Enseignements">Enseignements</option>
                <option value="Éveil musical">Éveil musical</option>
                <option value="Pratique d'ensemble">Pratique d'ensemble</option>
            </select>
            <!-- -------------------- -->

            <!-- Liste déroulante NIVEAUX -->

            <label for="f_niveau">Selectionner le niveau:</label>
            <select name="f_niveau" id="niveau_offre">
                <option value="Tous">Tous</option>
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Semi Pro">Semi Pro</option>
                <option value="Pro">Pro</option>
                <option value="Confirmé">Confirmé</option>
            </select>
            <!-- -------------------- -->

            <!-- Zone recherche par texte  -->
            <label for="f_mot_cle">Mot clé:</label>

            <input placeholder="Mots clés a rechercher ... " type="search" id="mots_cle" name="f_mot_cle">
            <input type="button" value="Rechercher" onclick="afficherResultats()"></input>
            <!-- -------------------- -->
        </form>
        <!-- ICI INSERER CARTE SI ON FINIT PAR LA RAJOUTER  -->
        
        <!-- <div class="map__img">
            <img width="auto" height="65%" src="carte" alt="Carte de l'aveyron" srcset="/pratique-musique-12/testing/carte/Carte_du_Rouergue.svg" />
        </div> -->



        
        <script type="text/javascript" src="recherche.js"></script>
<!--        <script type="text/javascript" src="/pratique-musique-12/pages/functions.js"></script>-->
        <div id="resultats">

        </div>


    </section>

    <?php
    include('footer.php');
    ?>
</body>

</html>