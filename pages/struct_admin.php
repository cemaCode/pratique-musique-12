<?php
    require_once('head.php')
?>


<body>
    <?php
    require_once('header.php');
      ?>

    <h2>Administration du compte Structure</h2>
    <section>

        <p>Bonjour, bienvenue sur la page d'admin pour une structure </p>
        <p>Vous êtes connecté.e en tant que <?php echo $_SESSION['login']; ?></p>
        <p>Ici vous pouvez gèrer votre compte ; ajouter/modifier/supprimer une annonce </p>

    </section>

    <?php
    require_once('footer.php');
    ?>
</body>
</html>