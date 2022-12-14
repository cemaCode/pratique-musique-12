<!DOCTYPE html>
<html lang="fr">

<head>
    <title>pratique-musique-12</title>
    <link rel="icon" type="image/x-icon" href="/pratique-musique-12/icons/icone.ico">    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/pratique-musique-12/stylesheet/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/pratique-musique-12/stylesheet/connexion.css" media="screen"/>
</head>

<header>
    <div class="homeLink"><a href="/pratique-musique-12/index.php"><img src="/pratique-musique-12/images/logo.png" ></a></div>
</header>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/pratique-musique-12/testing/dbController.php");

    if(isset($_POST['f_login_button'])){
        $db = new dbController();
        $mail = $db ->cleanInput($_POST['f_login']);
        $motDePasse = $db ->cleanInput($_POST['f_password']);
        if ($mail != "" && $motDePasse != ""){
            $isLoginValid = $db->checkLogin($mail, $motDePasse);
            print_r($isLoginValid);

            if($isLoginValid){
                $_SESSION['login'] = $mail;
                if( $_SESSION['admin']){
                    header('Location: admin.php');
                }else
                    header('Location: struct_admin.php');
             }
    }
    }
?>

<body>

    <div class="connexion">

        <h3>Connexion</h3>
        <form action="connexion.php" method="POST" name="f_connexion">

            <label for="login">Nom d'utilisateur : </label>
            <input type="text" name="f_login" id="login">
            <label for="password">Mot de passe : </label>
            <input type="password" name="f_password" id="password">
            </br>
            <input class="connect" type="submit" value="Se connecter" name="f_login_button"/>
        </form>
    </div>

    


    <?php
        include('footer.php');
    ?>

</body>
</html>