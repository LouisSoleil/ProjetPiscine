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

<?php echo "<a href='routeur.php?controller=personne&&action=createEleve'>"."S'inscrire en tant qu'élève".'</a></br>';?>
<?php echo "<a href='routeur.php?controller=personne&&action=createProfesseur'>"."S'inscrire en tant que professeur".'</a></br>';?>
<?php echo "<a href='routeur.php?controller=toeic&&action=created'>"."Créer toeic".'</a></br>';?>

</body>
</html>

