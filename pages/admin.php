<?php
require_once('head.php')
?>

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");

// Verifie si connecté, ca redirige à l'accueil sinon
if(!isset($_SESSION['login'])){
    header('Location: ../index.php');
}elseif( !$_SESSION['admin']){
    header('Location: ../struct_admin.php');
}

?>
<body>
    <?php
    require_once('header.php');
    ?>

    <h2>Admin</h2>
    <section>

        <p>Bonjour, bienvenue sur la page d'accueil </p>
        <p>Vous êtes connecté.e en tant que <?php echo $_SESSION['login']; ?></p>


        <style>
            #formulaires {
                display: flex;
                flex-direction: row;

            }

            .form {
                display: flex;
                flex-direction: column;
            }
        </style>

        <div id="formulaires">
            <!-- **********USER******** -->
            <div class="form" id="f_ajout_user">
                <form action="POST">
                    <h4>Ajouter un utilisateur</h4>
                    <label for="f_mail">Saisir le mail * :</label>
                    <input type="text" name="f_mail"><br>
                    <label for="f_mdp">Saisir le mot de passe * :</label>
                    <input type="text" name="f_mdp"><br>
                    <input type="button" value="Créer l'utilisateur ">
                </form>
            </div>

            <!-- **********STRUCT******** -->
            <div class="form" id="f_ajout_struct">
                <form action="POST">
                    <h4>Ajouter une structure :</h4>


                    <label for="f_s_nom">Saisir le nom de la structure * :</label>
                    <input type="text" name="f_s_nom"><br>

                    <label for="f_s_contact">Saisir adresse de contact * :</label>
                    <input type="text" name="f_s_contact"><br>

                    <label for="f_s_tel">Saisir le numero de telephone * :</label>
                    <input type="text" name="f_s_tel"><br>

                    <label for="f_s_website">Saisir le site internet * :</label>
                    <input type="text" name="f_s_website"><br>

                    <label for="f_s_contact">Saisir l'adresse de la structure * :</label>
                    <input type="text" name="f_s_contact"><br>



                    <input type="button" value="Créer la structure ">
                </form>
            </div>

            <!-- **********OFFRE******** -->
            <div class="form" id="f_ajout_offre">

                <form action="POST">
                    <h4>Ajouter une offre :</h4>
                    <label for="f_mail">Saisir le mail :</label>
                    <input type="text" name="f_mail"><br>

                    <label for="f_mdp">Saisir le mot de passe :</label>
                    <input type="text" name="f_mdp"><br>

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