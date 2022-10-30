<?php
require_once('head.php')
?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pratique-musique-12/testing/dbController.php");

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
    <h2>Admin</h2>
    <section>

        <p>Bonjour, bienvenue sur la page d'accueil </p>
        <p>Vous êtes connecté.e en tant que <?php echo $_SESSION['login']; ?></p>


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
                    <input type="button" value="Créer l'utilisateur ">
                </form>
            </div>

            <!-- **********INSTRUMENT******** -->
            <div class="form" id="f_ajout_instrument">
                <form action="POST">
                    <h4>Ajouter un instrument :</h4>
                    <label for="f_i_instru">Saisir le nom d'instrument :</label><br>
                    <input type="text" name="f_i_instru" id="f_i_instru"><br>
                    <input type="button" value="Ajouter l'instrument">
                </form>
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

                    <label for="f_s_contact">Saisir l'adresse de la structure * :</label>
                    <input type="text" name="f_s_contact" id="f_s_contact"><br>

                    <label for="f_s_lieu">Choisir la commune * :</label><br>
                    <select name="f_s_lieu" id="f_s_lieu">
                        <?php
                        $db = new dbController();
                        $communes = $db->getCommunes();

                        foreach ($communes as $commune) {
                            echo "<option>";
                            echo $commune['nomCommune'] . " - " . $commune['codePostal'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>
                    <label for="f_s_user"> Lier à un utilisateur </label><br>
                    <select name="f_s_user" id="f_s_user">
                        <?php
                        $utlisateurs = $db->getStructUsers();

                        foreach ($utlisateurs as $utlisateur) {
                            echo "<option>";
                            echo $utlisateur['mail'];
                            echo "</option>";
                        }
                        ?>
                    </select><br>

                    <input type="button" value="Créer la structure" onclick="creerStructure()">
                </form>
            </div>

            <!-- **********OFFRE******** -->
            <div class="form" id="f_ajout_offre">

                <form action="POST">
                    <h4>Ajouter une offre :</h4>
                    <label for="f_o_nom">Saisir nom de l'offre :</label><br>
                    <input type="text" name="f_o_nom" id="f_o_nom"><br>
                    <label for="f_mdp">Saisir la description de l'offre :</label><br>
                    <textarea rows="4" cols="30" type="tex" id="f_o_desc" name="f_o_desc"></textarea><br>
                    <label for="f_o_img">Choisir les 3 images pour l'offre * : </label><br>
                    <input type="file" id="f_ajout_offre" d="f_o_img_1" accept="image/png, image/jpeg"><br>
                    <input type="file" id="f_o_img_2" accept="image/png, image/jpeg"><br>
                    <input type="file" id="f_o_img_3" accept="image/png, image/jpeg"><br>
                    <label for="f_rubrique">Selectionner la rubrique de l'offre :</label><br>
                    <select name="f_o_rubrique" id="f_o_rubrique">
                        <option value="Accompagnement">Accompagnement </option>
                        <option value="Diffusion">Diffusion</option>
                        <option value="Enseignements">Enseignements</option>
                        <option value="Éveil musical">Éveil musical</option>
                        <option value="Pratique d'ensemble">Pratique d'ensemble</option>
                    </select>
                    <!-- Liste déroulante NIVEAUX -->
                    <label for="f_o_niveau">Selectionner le niveau de l'offre :</label><br>
                    <select name="f_o_niveau" id="f_o_niveau">
                        <option value="Tous">Tous</option>
                        <option value="Débutant">Débutant</option>
                        <option value="Intermédiaire">Intermédiaire</option>
                        <option value="Semi Pro">Semi Pro</option>
                        <option value="Pro">Pro</option>
                        <option value="Confirmé">Confirmé</option>
                    </select>
                    <label for="f_o_instru">Selectionner un instrument :</label><br>

                    <input type="button" value="Créer l'offre ">
                </form>
            </div>
        </div>

    </section>

    <?php
    require_once('footer.php');
    ?>
</body>

</html>