<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Profil élève</title>

</head>



<body>

<h2> Mon profil</h2>



<div class="left column"> <!-- Mes infos -->

    <h4> MES INFORMATIONS </h4>

    Code INE : <?php echo $_SESSION['codeINE'] ?> <br>

    Nom : <?php echo $_SESSION['nom'] ?> <br>

    Prénom : <?php echo $_SESSION['prenom'] ?> <br>

    Email : <?php echo $_SESSION['email'] ?> <br>

    Classe : <?php echo $_SESSION['classe'] ?> <br>

    Groupe : <?php echo $_SESSION['groupe'] ?> <br>

    <img width="250" src="<?php echo '../../membres/photos/'.$_SESSION['codeINE']; ?>"> <br>

    <?php echo '<input type="button" value="Modifier le profil" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=update\'">'; ?>

</div>





<div class="right  column"> <!-- Mes stats -->

    <h4>MES STATISTIQUES</h4>

</div>





</body>

</html>
