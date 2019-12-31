<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier le profil</title>
</head>

<body>

<form method="post" action="routeur.php?controller=personne&&action=update" enctype="multipart/form-data">
    <fieldset>
        <legend><b></b></legend>
        <p>
            <label for="nom">Photo</label> :
            <input type="file" name="photo" required/>
        </p>
        <p>
            <input type="submit" name="formupdate" value="Valider" />
        </p>
    </fieldset>
</form>

<input type='hidden' name='action' value='created'>

</body>
</html>
