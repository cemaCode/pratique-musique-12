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

    </section>

    <?php
    require_once('footer.php');
    ?>
</body>
</html>