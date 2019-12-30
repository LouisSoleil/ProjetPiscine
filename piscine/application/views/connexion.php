<?php

if (isset($_SESSION)) {
    unset($_SESSION);
}

//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
</head>

<body>
<h3>Connexion</h3>


<form method="post" action="routeur.php?controller=personne&&action=connected">
    <fieldset>
        <legend><b></b></legend>
        <p>
            <label for="email">Adresse mail</label> :
            <input type="text" name="email" id="email" required/>
            <br>

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" id="password" required/>
            <br>
        </p>
        <p>
            <input type="submit" value="Se connecter" />
        </p>
    </fieldset>
</form>

<input type='hidden' name='action' value='connected'>

<input type="button" value="S'inscrire en tant qu'élève" onclick="javascript:location.href='routeur.php?controller=personne&&action=createEleve'">
<input type="button" value="S'inscrire en tant que professeur" onclick="javascript:location.href='routeur.php?controller=personne&&action=createProfesseur'">


</body>
</html>

