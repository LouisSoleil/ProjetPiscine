<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>S'inscrire (élève)</title>
</head>

<body>
<h3> S'inscrire en tant qu'élève</h3>


<form method="post" action="routeur.php?controller=personne&&action=createEleve">
        <p>

            <label for="nom">Nom</label> :
            <input type="text" name="nom" value="<?php if(!isset($erreurs['nom']) && isset($nom)) { echo $nom; } ?>" required/>
            <br>

            <label for="prenom">Prénom</label> :
            <input type='text' name="prenom" value="<?php if(!isset($erreurs['prenom']) && isset($prenom)) { echo $prenom; } ?>" required/>
            <br>

            <label for="email">Adresse mail</label> :
            <input type='email' name="email" value="<?php if(!isset($erreurs['email']) && isset($email)) { echo $email; } ?>" required/>
            <br>

            <label for="codeINE">Code INE</label> :
            <input type='text' name="codeINE" value="<?php if(!isset($erreurs['codeINE']) && isset($ine)) { echo $ine; } ?>" required/>
            <br>

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" required/>
            <br>

            <label for="password_confirm">Confirmation du mot de passe</label> :
            <input type='password' name="password_confirm" required/>
            <br>

            <label for="classe">Classe</label> :
            <SELECT name="classe">
                <?php
                foreach ($liste_classes as $value) {
                    echo "<OPTION value='$value' ".(($_POST['classe'] == $value) ? "selected" : "").">$value</OPTION>";
                }
                ?>
            </SELECT>
            <br>

            <label for="annee">Année</label> :
            <SELECT name="annee">
                <?php
                for ($i = 3; $i <= 5; $i++) {
                    echo "<OPTION value='$i' ".(($_POST['annee'] == $i) ? "selected" : "").">$i</OPTION>";
                }
                ?>
            </SELECT>
            <br>

            <label for="groupe">Groupe</label> :
            <SELECT name="groupe">
                <?php
                foreach ($liste_groupes as $value) {
                    echo "<OPTION value='$value' ".(($_POST['groupe'] == $value) ? "selected" : "").">$value</OPTION>";
                }
                ?>
            </SELECT>
            <br>


        </p>
        <p>
            <input type="submit" name="forminscription_eleve" value="S'inscrire" />
        </p>
</form>

<?php

if (isset($erreurs)) {
    foreach ($erreurs as $value) {
        echo $value."<br>";
    }
}
?>

<?php echo "<a href='routeur.php?controller=personne&&action=connect'>"."Se connecter".'</a></br>';?>

</body>
</html>
