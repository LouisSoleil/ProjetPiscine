<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>S'inscrire (élève)</title>
</head>

<body>
<h3> S'inscrire en tant qu'élève</h3>


<form method="post" action="routeur.php?controller=personne&&action=createdEleve">
    <fieldset>
        <legend><b></b></legend>
        <p>

            <label for="nom">Nom</label> :
            <input type="text" name="nom" id="nom" required/>
            <br>

            <label for="prenom">Prénom</label> :
            <input type='text' name="prenom" id="prenom" required/>
            <br>

            <label for="email">Adresse mail</label> :
            <input type='text' name="email" id="email" required/>
            <br>

            <label for="codeINE">Code INE</label> :
            <input type='text' name="codeINE" id="codeINE" required/>
            <br>

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" id="password" required/>
            <br>

            <label for="password_confirm">Confirmation du mot de passe</label> :
            <input type='password' name="password_confirm" id="password_confirm" required/>
            <br>

            <label for="classe">Classe</label> :
            <SELECT name="classe">
                <?php
                foreach ($liste_classes as $value) {
                    echo "<OPTION>$value</OPTION>";
                }
                ?>
            </SELECT>
            <br>

            <label for="annee">Année</label> :
            <SELECT name="annee">
                <OPTION value="3">3</OPTION>
                <OPTION value="4">4</OPTION>
                <OPTION value="5">5</OPTION>
            </SELECT>
            <br>

            <label for="groupe">Groupe</label> :
            <SELECT name="groupe">
                <?php
                foreach ($liste_groupes as $value) {
                    echo "<OPTION>$value</OPTION>";
                }
                ?>
            </SELECT>
            <br>


        </p>
        <p>
            <input type="submit" value="S'inscrire" />
        </p>
    </fieldset>
</form>

<input type='hidden' name='action' value='createdEleve'>

<?php echo "<a href='routeur.php?controller=personne&&action=connect'>"."Se connecter".'</a></br>';?>

</body>
</html>
