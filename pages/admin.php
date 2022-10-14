<?php
    require_once('head.php')
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