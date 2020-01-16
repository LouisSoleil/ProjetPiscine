<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/createCss.css">
    <title>S'inscrire (professeur)</title>
</head>

<body>

<?php include('../../assets/css/headerLess.php'); ?>

<div class="content">

    <h3> S'inscrire en tant que professeur</h3>


    <form method="post" action="routeur.php?controller=personne&&action=createProfesseur">

        <p>

        <div class="label">

            <label for="nom">Nom</label> :
            <input type="text" name="nom" id="nom" value="<?php if(!isset($erreurs['nom']) && isset($nom)) { echo $nom; } ?>"  required/>
            <br>

            <label for="prenom">Prénom</label> :
            <input type='text' name="prenom" id="prenom" value="<?php if(!isset($erreurs['prenom']) && isset($prenom)) { echo $prenom; } ?>" required/>
            <br>

            <label for="email">Adresse mail</label> :
            <input type='email' name="email" id="email" value="<?php if(!isset($erreurs['email']) && isset($email)) { echo $email; } ?>" required/>
            <br>

            <label for="codeINE">Code INE</label> :
            <input type='text' name="codeINE" id="codeINE" value="<?php if(!isset($erreurs['codeINE']) && isset($ine)) { echo $ine; } ?>" required/>
            <br>

        </div>

        </p>
        <p> Un mail vous sera envoyé avec un mot de passe temporaire. </p>

        <p>
            <input class="bouton" type="submit" name="forminscription_prof" value="S'inscrire" />
        </p>

    </form>

    <?php

    if (isset($erreurs)) {
        foreach ($erreurs as $value) {
            echo $value."<br>";
        }
    }
    ?>

    <?php echo "<a href='routeur.php?controller=personne&&action=connect'>"."Retour à la connexion".'</a></br>';?>

</div>

<?php include('../../assets/css/footerLess.php'); ?>

</body>
</html>