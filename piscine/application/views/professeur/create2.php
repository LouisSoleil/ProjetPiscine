<!DOCTYPE html>
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=piscine', 'root', '');

$erreurN = $erreurP = $erreurI = $erreurM = $erreurPwd = "";
$nomOK = $prenomOK = $ineOK = $mailOK = $pwdOK = false;
$nom = $prenom = $ine = $mail = "";

if(isset($_POST['forminscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['email']);
    $ine = htmlspecialchars($_POST['codeINE']);
    $pwd = $_POST['password'];
    $pwdBis = $_POST['password_confirm'];

    $nomLenght = strlen($nom);
    if (!preg_match("/^[a-z|A-Z]{1,55}$/", $nom))
    {
        $erreurN = "le nom est trop long";
    } else {
        $nomOK = true;
        $nomF = strtolower($nom);
    }

    $prenomLenght = strlen($prenom);
    if (!preg_match("/^[a-z|A-Z]{1,55}$/", $prenom))
    {
        $erreurP = "le prénom est trop long";
    } else {
        $prenomOK = true;
        $prenomF = strtolower($prenom);
    }

    $ineLenght = strlen($ine);
    if ($ineLenght != 11)
    {
        $erreurI = "le code INE n'a pas le bon nombre de caractère";
    } else {
        $ineOK = true;
    }

    if (!preg_match("/^[a-z]+.[a-z]+@umontpellier.fr$/", $mail))
    {
        $erreurM = "l'adresse mail n'est pas de la bonne forme";
    } else {
        $reqmail = $bdd->prepare("SELECET * FROM personne WHERE email = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();
        if ($mailexist == 0)
        {
            $mailOK = true;

        } else {
            $erreurM = "ce mail est déjà affilié à un compte";
        }
    }

    if ($pwd != $pwdBis)
    {
        $erreurPwd = "vos mots de passe ne correspondent pas";
    } else {
        $pwdF = password_hash($pwd, PASSWORD_DEFAULT);
        $pwdOK = true;
    }

    if ($nomOK AND $prenomOK AND $ineOK AND $mailOK AND $pwdOK)
    {
        ControllerPersonne::createdProfesseur();
    }

}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>S'inscrire (professeur)</title>
</head>

<body>
<h3> S'inscrire en tant que professeur</h3>


<form method="post" action="">
    <fieldset>
        <legend><b></b></legend>
        <p>

            <label for="nom">Nom</label> :
            <input type="text" name="nom" id="nom" value="<?php if($nomOK) { echo $nom; } ?>"  required/>
            <br>

            <label for="prenom">Prénom</label> :
            <input type='text' name="prenom" id="prenom" value="<?php if($prenomOK) { echo $prenom; } ?>" required/>
            <br>

            <label for="email">Adresse mail</label> :
            <input type='email' name="email" id="email" value="<?php if($mailOK) { echo $mail; } ?>" required/>
            <br>

            <label for="codeINE">Code INE</label> :
            <input type='text' name="codeINE" id="codeINE" value="<?php if($ineOK) { echo $ine; } ?>" required/>
            <br>

            <label for="password">Mot de passe</label> :
            <input type='password' name="password" id="password" required/>
            <br>

            <label for="password_confirm">Confirmation du mot de passe</label> :
            <input type='password' name="password_confirm" id="password_confirm" required/>
            <br>


        </p>
        <p>
            <input type="submit" name="forminscription" value="S'inscrire" />
        </p>
    </fieldset>
</form>

<?php
if(isset($erreurN))
{
    echo $erreurN;
    echo '<br>';
}

if(isset($erreurP))
{
    echo $erreurP;
    echo '<br>';

}

if(isset($erreurI))
{
    echo $erreurI;
    echo '<br>';

}

if(isset($erreurM))
{
    echo $erreurM;
    echo '<br>';

}

if(isset($erreurPwd))
{
    echo $erreurPwd;
    echo '<br>';

}

if(isset($messageFin)){
    echo $messageFin;
}

?>

<input type='hidden' name='action' value='created'>

</body>
</html>