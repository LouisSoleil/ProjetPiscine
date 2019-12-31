<?php unset($_SESSION); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
</head>

<body>
<h3>Connexion</h3>


<form method="post" action="routeur.php?controller=personne&&action=connect">
    <fieldset>
        <legend><b></b></legend>
        <p>
            <label for="email">Adresse mail</label> :
            <input type="email" name="email" value="<?php if(!isset($erreurs['email']) && isset($_POST['email'])) { echo $_POST['email']; } ?>" required/>
            <br>

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" required/>
            <br>
        </p>
        <p>
            <input type="submit" name="formconnexion" value="Se connecter" />
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
<br>
<input type="button" value="S'inscrire en tant qu'élève" onclick="javascript:location.href='routeur.php?controller=personne&&action=createEleve'">
<input type="button" value="S'inscrire en tant que professeur" onclick="javascript:location.href='routeur.php?controller=personne&&action=createProfesseur'">


</body>
</html>

