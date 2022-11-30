<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
$db = new dbController();
// Verifie si connecté, ca redirige à l'accueil sinon
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
} elseif (isset($_SESSION['admin'])) { //Si le comte est admin on redirige vers admin.php
    header('Location: ../pages/admin.php');
}

require_once('head.php')

?>

<style>
    #formulaires {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .form {
        display: flex;
        border: solid;
        border-color: rgb(105, 39, 5);
        border-top-left-radius: 5px;
        border-bottom-right-radius: 5px;
        margin: 10px;
        padding-left: 10px;
        flex-direction: column;
        flex: 45% 0 0;
    }

    label {
        display: inline-block;
        width: 250px;
        text-align: left;
        margin-left: 5px;
    }

    input,
    select,
    textarea {
        margin: 5px;
    }

    h4 {
        margin: 5px;
        margin-left: 0px;
    }

    div input[type=button] {
        display: block;
        margin: 20px auto;
        text-align: center;
        font-weight: bold;
        padding: 5px;
        border: solid;
        border-bottom-left-radius: 5px;
        border-top-right-radius: 5px;
        font-size: medium;

    }
</style>

<body>
    <?php
    require_once('header.php');
    ?>

    <h2>Administration du compte Structure</h2>
    <section>

        <p>Bonjour, bienvenue sur la page d'admin pour une structure </p>
        <p>Vous êtes connecté.e en tant que <b><?php echo $_SESSION['login']; ?></b> . </p>
        <p>Ici vous pouvez gèrer votre compte ; <b>ajouter</b> / <b>modifier</b> / <b>supprimer</b> une annonce </p>
        <div id="formulaires">
           
            <!-- **********OFFRE******** -->
            <div class="form" id="f_ajout_offre">

                <form enctype=”multipart/form-data” action="POST">
                    <h4>Ajouter une offre : </h4>
                    <label for="f_o_nom">Saisir nom de l'offre* :</label><br>
                    <input type="text" name="f_o_nom" id="f_o_nom"><br>
                    <label for="f_o_desc">Saisir la description de l'offre :</label><br>
                    <textarea rows="4" cols="30" type="tex" id="f_o_desc" name="f_o_desc"></textarea><br>
                    <label for="f_o_img">Choisir les 3 images pour l'offre  : </label><br>
                    <input type="file" id="f_o_img_1" accept="image/png, image/jpeg" disabled><br>
                    <input type="file" id="f_o_img_2" accept="image/png, image/jpeg" disabled><br>
                    <input type="file" id="f_o_img_3" accept="image/png, image/jpeg" disabled><br>
                    <label for="f_rubrique">Selectionner la rubrique de l'offre *:</label><br>
                    <select name="f_o_rubrique" id="f_o_rubrique">
                        <option value="Accompagnement">Accompagnement </option>
                        <option value="Diffusion">Diffusion</option>
                        <option value="Enseignements">Enseignements</option>
                        <option value="Éveil musical">Éveil musical</option>
                        <option value="Pratique d'ensemble">Pratique d'ensemble</option>
                    </select><br>
                    <!-- Liste déroulante NIVEAUX -->
                    <label for="f_o_niveau">Selectionner le niveau de l'offre *:</label><br>
                    <select name="f_o_niveau" id="f_o_niveau">
                        <option value="Tous">Tous</option>
                        <option value="Débutant">Débutant</option>
                        <option value="Intermédiaire">Intermédiaire</option>
                        <option value="Semi Pro">Semi Pro</option>
                        <option value="Pro">Pro</option>
                        <option value="Confirmé">Confirmé</option>
                    </select><br>
                    <label for="f_o_instru">Selectionner un instrument :</label><br>
                    <select name="f_o_instru" id="f_o_instru">
                        <option></option>
                        <?php
                        $instruments = $db->getInstruments();

                        foreach ($instruments as $instrument) {
                            echo "<option>";
                            echo $instrument['nomInstrument'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <label for="f_o_struct">Lier à une Structure *:</label><br>
                    <select name="f_o_struct" id="f_o_struct">
                    <?php
                        $structures = $db->getStructures();

                        foreach ($structures as $structure) {
                            echo "<option >";
                            echo $structure['nomStructure'] . " | " . $structure['contact'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <input type="button" value="Créer l'offre " onclick="addOffre()">
                </form>
                <div id="result_f_ajout_offre"></div>

            </div>






            <div class="form" id="f_suppr_offre">
                <h4>Supprimer une offre :</h4>
                <label for="f_s_offre">Chosir l'offre à modifier :</label><br>
                <select name="f_s_offre" id="s_offre">

                    <!-- TODO : a bunch of stuff -->
                    <?php
                    $offres = $db->getOffres();
                    foreach ($offres as $offre) {
                        echo "<option>";
                        echo  $offre['idOffre'] . "#  - " . $offre['nomOffre'];
                        echo "</option>";
                    }
                    ?>
                </select><br>
                <input type="button" value="Supprimer l'offre " onclick="deleteOffre();">
                <div id="result_f_suppr_offre"></div>
            </div>

         
        </div>

        <script language="javascript" src="admin.js"></script>
        </div>
    </section>

    <?php
    require_once('footer.php');
    ?>
</body>

</html>