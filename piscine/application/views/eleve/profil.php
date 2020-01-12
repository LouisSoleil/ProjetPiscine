<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel=stylesheet href="../../assets/css/profilCss.css" type="text/css">
    <meta charset="UTF-8">

    <title>Profil élève</title>

</head>



<body>

    <?php include('../../assets/css/header.php'); ?>

<div class="content">

<h2> Mon profil</h2>



<div class="contents">
<fieldset>
   <legend> <h4> MES INFORMATIONS </h4> </legend>
    Code INE : <?php echo $_SESSION['codeINE'] ?> <br>
    Nom : <?php echo $_SESSION['nom'] ?> <br>
    Prénom : <?php echo $_SESSION['prenom'] ?> <br>
    Email : <?php echo $_SESSION['email'] ?> <br>
    Classe : <?php echo $_SESSION['classe'] ?> <br>
    Groupe : <?php echo $_SESSION['groupe'] ?> <br>
</fieldset>
</div>

<div class="photo">
<img class="img" src="<?php echo '../../membres/photos/'.$_SESSION['codeINE']; ?>"> <br>
<?php echo '<input type="button" value="Modifier le profil" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=update\'">'; ?>
</div>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>

</html>