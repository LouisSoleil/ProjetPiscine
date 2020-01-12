<!DOCTYPE html>

<html>

<head>

    <link rel=stylesheet href="../../assets/profilCss.css" type="text/css">
    <meta charset="UTF-8">

    <title>Profil élève</title>

</head>

<body>

<h2> Mon profil</h2>

<div class="contents">
<fieldset>
   <legend> <h4> MES INFORMATIONS </h4> </legend>
   <br>
    Code INE : <?php echo $_SESSION['codeINE'] ?> <br>
    <br>
    Nom : <?php echo $_SESSION['nom'] ?> <br>
    <br>
    Prénom : <?php echo $_SESSION['prenom'] ?> <br>
    <br>
    Email : <?php echo $_SESSION['email'] ?> <br>
    <br>
    Classe : <?php echo $_SESSION['classe'] ?> <br>
    <br>
    Groupe : <?php echo $_SESSION['groupe'] ?> <br>
</fieldset>
</div>

<div class="photo">
<img src="<?php echo '../../membres/photos/'.$_SESSION['codeINE']; ?>"> <br>
<?php echo '<input type="button" value="Modifier le profil" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=update\'">'; ?>
</div>

</body>

</html>