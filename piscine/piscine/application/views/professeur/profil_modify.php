<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
<link rel=stylesheet href="../../assets/css/profil_modify2Css.css" type="text/css">

<head>
    <meta charset="UTF-8">
    <title>Modifier le profil</title>
</head>

<body>

    <?php include('../../assets/css/header.php'); ?>

<div class="content">

<h2> Modifier mon profil </h2>

<form method="post" action="routeur.php?controller=personne&&action=update" enctype="multipart/form-data">

    <div class="leftcolumn">

        <label for="nom">Nom</label> :
        <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" required/>
        <br>

        <label for="prenom">Prénom</label> :
        <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" required/>
        <br>

        <label for="email">Email</label> :
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required/>
        <br>

        <label for="codeINE">Code INE</label> :
        <input type='text' name="codeINE" value="<?php echo $_SESSION['codeINE']; ?>" required/>
        <br>


        <label for="mdp_actuel">Mot de passe actuel</label> :
        <input type="password" name="mdp_actuel"/>
        <br>

        <label for="changer_mdp">Nouveau mot de passe</label> :
        <input type="password" name="changer_mdp"/>
        <br>

        <label for="confirmer_nv_mdp">Confirmation nouveau mot de passe</label> :
        <input type="password" name="confirmer_nv_mdp"/> <br>
    </div>

    <div class="rightcolumn">
        <img width="200" src="<?php echo '../../membres/photos/'.$_SESSION['codeINE'].'.jpeg'; ?>">
        <label for="nom"></label>
        <input type="file" name="photo" /> <br>
    </div>

    <p>
    <input type="submit" name="formupdate" value="Valider" />
    </p>

</form>

<?php

if (isset($erreurs)) {
    foreach ($erreurs as $value) {
        echo $value."<br>";
    }
}
?>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
