<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier le profil</title>
</head>

<body>

<?php
var_dump($_SESSION);

echo "T'es trop fort, t'es sur la page profil";
echo '<input type="button" value="Modifier le profil" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=update\'">';
?>

<img width="250" src="<?php echo '../../membres/photos/'.$_SESSION['codeINE'].'.jpeg'; ?>">



</body>
</html>


