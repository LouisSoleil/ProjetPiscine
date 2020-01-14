<?php unset($_SESSION); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/connexionCss.css">
    <meta charset="UTF-8">
    <title>Se connecter</title>
</head>

<body>

<?php include('../../assets/css/headerLess.php'); ?>

<div class="content">

    <h3 class="title">Connexion</h3>


    <form method="post" action="routeur.php?controller=personne&&action=connect">
        <p>
            <label for="email">Adresse mail</label> :
            <input type="email" name="email" value="<?php if(!isset($erreurs['email']) && isset($_POST['email'])) { echo $_POST['email']; } ?>" required/>
            <br>

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" required/>
            <br>
        </p>
        <p>
            <input class="bouton" type="submit" name="formconnexion" value="Se connecter" />
        </p>
    </form>

    <?php

    if (isset($erreurs)) {
        foreach ($erreurs as $value) {
            echo $value."<br>";
        }
    }
    ?>
    <br>
    <input class="bouton" type="button" value="S'inscrire en tant qu'élève" onclick="javascript:location.href='routeur.php?controller=personne&&action=createEleve'">
    <input class="bouton" type="button" value="S'inscrire en tant que professeur" onclick="javascript:location.href='routeur.php?controller=personne&&action=createProfesseur'">

</div>

<?php include('../../assets/css/footerLess.php'); ?>

</body>
</html>

