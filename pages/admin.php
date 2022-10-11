<?php
include('head.php')
?>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");


// Verifie si connecté, ca redirige à l'accueil sinon
if(!isset($_SESSION['login'])){
    header('Location: ../index.php');
}

// Deconnexion
if(isset($_POST['f_logout_button'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
<body>
<?php
include('header.php');
?>

<h2>Admin</h2>
<section>

<h1>Bonjour, bienvenue sur la page d'accueil </h1>
<h2>Vous êtes connecté.e en tant que  <?php echo $_SESSION['login'];?></h2>


<form method='post' action="">
            <input type="submit" value="Se déconnecter" name="f_logout_button">
        </form>
</section>

<?php
include('footer.php');
?>
</body>
</html>