<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier le profil</title>
</head>

<body>

<form method="post" action="routeur.php?controller=personne&&action=update" enctype="multipart/form-data">

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

    <label for="classe">Classe</label> :
    <SELECT name="classe">
        <?php
        foreach ($liste_classes as $value) {
            echo "<OPTION value='$value' ".((substr($_SESSION['classe'],0,-1) == $value) ? "selected" : "").">$value</OPTION>";
        }
        ?>
    </SELECT>
    <br>

    <label for="annee">Année</label> :
    <SELECT name="annee">
        <?php
        for ($i = 3; $i <= 5; $i++) {
            echo "<OPTION value='$i' ".((substr($_SESSION['classe'],-1) == $i) ? "selected" : "").">$i</OPTION>";
        }
        ?>
    </SELECT>
    <br>

    <label for="groupe">Groupe</label> :
    <SELECT name="groupe">
        <?php
        foreach ($liste_groupes as $value) {
            echo "<OPTION value='$value' ".(($_SESSION['groupe'] == $value) ? "selected" : "").">$value</OPTION>";
        }
        ?>
    </SELECT>
    <br>

    <label for="mdp_actuel">Mot de passe actuel</label> :
    <input type="password" name="mdp_actuel"/>
    <br>

    <label for="changer_mdp">Nouveau mot de passe</label> :
    <input type="password" name="changer_mdp"/>
    <br>

    <label for="confirmer_nv_mdp">Confirmation nouveau mot de passe</label> :
    <input type="password" name="confirmer_nv_mdp"/> <br>

    <label for="nom">Photo</label> :
    <input type="file" name="photo" /> <br>

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

</body>
</html>