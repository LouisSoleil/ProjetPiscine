<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>S'inscrire (professeur)</title>
</head>

<body>
<h3> S'inscrire en tant que professeur</h3>


<form method="post" action="routeur.php?controller=personne&&action=createProfesseur">
    <fieldset>
        <legend><b></b></legend>
        <p>

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

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" id="password" required/>
            <br>

            <label for="password_confirm">Confirmation du mot de passe</label> :
            <input type='password' name="password_confirm" id="password_confirm" required/>
            <br>
        </p>
        <p>
            <input type="submit" name="forminscription_prof" value="S'inscrire" />
        </p>
    </fieldset>
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