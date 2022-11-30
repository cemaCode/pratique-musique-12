<?php
require_once('head.php')
?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");
$db = new dbController();
// Verifie si connecté, ca redirige à l'accueil sinon
if (!isset($_SESSION['login'])) {
    header('Location: ../index.php');
} elseif (!$_SESSION['admin']) {
    header('Location: ../struct_admin.php');
}

?>

<body>
    <?php
    require_once('header.php');
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
    <h2>Administrateur</h2>
    <section>

        <p>Bonjour, bienvenue sur la page d'accueil </p>
        <p>Vous êtes connecté.e en tant que <b><?php echo $_SESSION['login']; ?></b> .</p>
        <p>Vous pouvez : </p>
        <span>
            <a href='#f_ajout_user' <li> - Ajouter un utilisateur </li></a>
            <a href='#f_ajout_instrument' <li> - Ajouter un instrument</li></a>
            <a href='#f_ajout_struct' <li> - Ajouter une structure</li></a>
            <a href='#f_ajout_offre' <li> - Ajouter une offre</li></a>
            <a href='#f_modifer_offre' <li> - Modifier une offre</li></a>
            <a href='#f_suppr_offre' <li> - Supprimer une offre</li></a>
            <a href='#f_txt_accueil' <li> - Modifier le texte de la page d'accueil</li></a>
        </span> <br>
        <div id="formulaires">
            <!-- **********USER******** -->
            <div class="form" id="f_ajout_user">
                <form action="POST">
                    <h4>Ajouter un utilisateur</h4>
                    <label for="f_mail">Saisir le mail * :</label>
                    <input type="text" name="f_mail" id="f_mail"><br>
                    <label for="f_mdp">Saisir le mot de passe * :</label>
                    <input type="text" name="f_mdp" id="f_mdp"><br>
                    <label for="f_role">Choisir le role de l'utilisateur * :</label>
                    <select name="f_role" id="f_role">
                        <option value="Administrateur">Administrateur</option>
                        <option value="Structure">Structure</option>
                    </select><br>
                    <input type="button" value="Créer l'utilisateur " onclick="addUser()">
                </form>
                <i>
                    <div id="result_f_ajout_user"></div>
                </i>
                <form>
                    <h4>Supprimer un utilisateur :</h4>
                    <label for="f_s_user">Choisr l'utilisateur à supprimer :</label><br>
                    <select name="f_s_user" id="f_s_user">
                        <?php
                        $users = $db->getUsers();

                        foreach ($users as $user) {
                            echo "<option>";
                            echo $user['mail'] . " | " . $user['nomRole'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <input type="button" value="Supprimer l'utilisateur" onclick="deleteUser()">
                </form>
                <i>
                    <div id="result_f_suppr_utilisateur"></div>
                </i>
            </div>

            <!-- **********INSTRUMENT******** -->
            <div class="form" id="f_ajout_instrument">
                <form action="POST">
                    <h4>Ajouter un instrument :</h4>
                    <label for="f_i_instru">Saisir le nom d'instrument :</label><br>
                    <input type="text" name="f_i_instru" id="f_i_instru"><br>
                    <input type="button" value="Ajouter l'instrument" onclick="addInstrument()">
                </form>
                <i>
                    <div id="result_f_ajout_instrument"></div>
                </i>

                <form action="POST">
                    <h4>Supprimer un instrument :</h4>
                    <label for="f_s_instru">Choisr l'instrument à supprimer :</label><br>
                    <select name="f_s_instru" id="f_s_instru">
                        <?php
                        $instruments = $db->getInstruments();

                        foreach ($instruments as $instrument) {
                            echo "<option>";
                            echo $instrument['nomInstrument'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <input type="button" value="Supprimer l'instrument" onclick="deleteInstrument()">
                </form>
                <i>
                    <div id="result_f_suppr_instrument"></div>
                </i>

            </div>

            <!-- **********STRUCT******** -->
            <div class="form" id="f_ajout_struct">
                <form action="POST">
                    <h4>Ajouter une structure :</h4>


                    <label for="f_s_nom">Saisir le nom de la structure * :</label>
                    <input type="text" name="f_s_nom" id="f_s_nom"><br>

                    <label for="f_s_contact">Saisir adresse de contact * :</label>
                    <input type="text" name="f_s_contact" id="f_s_contact"><br>

                    <label for="f_s_tel">Saisir le numero de telephone * :</label>
                    <input type="text" name="f_s_tel" id="f_s_tel"><br>

                    <label for="f_s_website">Saisir le site internet * :</label>
                    <input type="text" name="f_s_website" id="f_s_website"><br>

                    <label for="f_s_adresse">Saisir l'adresse de la structure * :</label>
                    <input type="text" name="f_s_adresse" id="f_s_adresse"><br>

                    <label for="f_s_commune">Choisir la commune * :</label><br>
                    <select name="f_s_commune" id="f_s_commune">
                        <?php
                        $communes = $db->getCommunes();

                        foreach ($communes as $commune) {
                            echo "<option value='" . $commune['codeInsee'] . "'>";
                            echo $commune['nomCommune'] . " - " . $commune['codePostal'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <label for="f_s_userlink"> Lier à un utilisateur </label><br>
                    <select name="f_s_userlink" id="f_s_userlink">
                        <option></option>
                        <?php
                        $utlisateurs = $db->getStructUsers();

                        foreach ($utlisateurs as $utlisateur) {
                            echo "<option>";
                            echo $utlisateur['mail'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>

                    <input type="button" value="Créer la structure" onclick="addStructure()">
                </form>
                <div id="result_f_ajout_struct"> </div>
                <form action="POST">
                    <h4>Supprimer une structure :</h4>
                    <label for="f_del_struct">Choisr la structure à supprimer :</label><br>
                    <select name="f_del_struct" id="f_del_struct">
                        <?php
                        $structures = $db->getStructures();

                        foreach ($structures as $structure) {
                            echo "<option >";
                            echo $structure['nomStructure'] . " | " . $structure['contact'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <input type="button" value="Supprimer la structure" onclick="deleteStructure()">
                </form>
                <i>
                    <div id="result_f_del_struct"></div>
                </i>
            </div>

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

            <div class="form" id="f_txt_accueil">
                <form action="POST">
                    <h4>Modifier le texte de la page d'accueil :</h4>
                    <label for="f_txt_accueil">Saisir le texte pour l'accueil :</label><br>
                    <textarea rows="20" cols="65" type="text" name="f_txt_accueil" id="txt_accueil"></textarea><br>
                    <input type="button" value="Modifier le texte" onclick="modifyText();">
                </form>

                <div id="result_f_txt_accueil"></div>
            </div>

        </div>

        <script language="javascript" src="admin.js"></script>

    </section>

    <?php
    require_once('footer.php');
    ?>
</body>

</html>