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
        <label for="classe">Classe</label> :
        <input type="text" name="classe" value="<?php echo $_SESSION['classe']; ?>" required/>
        <br>
        <label for="groupe">Groupe</label> :
        <input type="text" name="groupe" value="<?php echo $_SESSION['groupe']; ?>" required/>
        <br>
        <label for="mdp_actuel">Mot de passe actuel</label> :
        <input type="password" name="mdp_actuel"/>
        <br>
        <label for="changer_mdp">Nouveau mot de passe</label> :
        <input type="password" name="changer_mdp"/>
        <br>
        <label for="confirmer_nv_mdp">Confirmation nouveau mot de passe</label> :
        <input type="password" name="confirmer_nv_mdp"/> <br>
        <p>
            <input type="submit" name="formupdate" value="Valider" />
        </p>
</form>

<input type='hidden' name='action' value='created'>

</body>
</html>
